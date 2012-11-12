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
                $message = new YiiMailMessage();
                $message->view = 'order';

                $message->setBody(array('post' => $_POST['OrderForm'], 'products' => Cart::getProductsInfo()), 'text/html');

                $message->subject = 'Оформления заказа';
                
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