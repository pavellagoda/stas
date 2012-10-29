<?php

class CartController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new CArrayDataProvider($this->prepareCart(), array(
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                ));
        $this->render('index', array(
            'data' => $dataProvider));
    }

    private function prepareCart()
    {
        $ids = Yii::app()->session['cart'];
        $data = array();
        if ($ids) {
            foreach ($ids as $id => $product) {
                $data[$id]['id'] = $id;
                $data[$id]['count'] = $product['count'];
                $data[$id]['model'] = Product::model()->findByPk($id);
            }
        }
        return $data;
    }

}