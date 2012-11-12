<?php

class OrderController extends Controller
{

    public function actionIndex()
    {
        if(Cart::getCountElements() == 0) {
            $this->redirect($this->createUrl('/cart'));
        }
        $model = new OrderForm();
        if (isset($_POST['OrderForm'])) {
            $model->attributes = $_POST['OrderForm'];
            if ($model->validate()) {
                
                $transaction = Order::model()->dbConnection->beginTransaction();
                
                $model_order = new Order();
                
                $model_order->name = $_POST['OrderForm']['username'];
                $model_order->email = $_POST['OrderForm']['email'];
                $model_order->comment = $_POST['OrderForm']['comment'];
                $model_order->telephone = $_POST['OrderForm']['telephone'];
                $model_order->status = 'pending';
                $model_order->save();
                
                $products_info = Cart::getProductsInfo();
                
                foreach ($products_info as $product) {
                    $model_order_product = new OrderProduct();
                    $model_order_product->order_id = $model_order->id;
                    $model_order_product->product_id = $product['model']->id;
                    $model_order_product->price = $product['model']->price;
                    $model_order_product->count = $product['count'];
                    $model_order_product->save();
                }
                
                $transaction->commit();
                
                Cart::clear();
                
                $message = new YiiMailMessage();
                $message->view = 'order';

                $message->setBody(array('post' => $_POST['OrderForm'], 'products' => $products_info), 'text/html');

                $message->subject = 'Заказ №'.$model_order->id;
                
                $message->addTo(yii::app()->params['admin_email']);
                if(isset($_POST['OrderForm']['email']) && trim($_POST['OrderForm']['email'])!='') {
                    $message->addTo($_POST['OrderForm']['email']);
                }

                $message->from = array('viko@dev.com' => 'Viko');
                $result = Yii::app()->mail->send($message);
                
                if ($result) {
                    $this->redirect(array('success'));
                }
                
            }
        }
        Yii::app()->clientScript->registerScriptFile('/js/jquery.maskedinput-1.3.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile('/js/use-mask.js', CClientScript::POS_HEAD);
        $this->render('index', array(
            'model' => $model
            )
        );
    }

    public function actionSuccess()
    {
        $this->render('success');
    }

}