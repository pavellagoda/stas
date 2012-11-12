<?php

class OrderController extends Controller
{

    public function actionIndex()
    {
        $model = new OrderForm();
        if (isset($_POST['OrderForm'])) {
            $model->attributes = $_POST['OrderForm'];
            if ($model->validate()) {
                var_dump('validate'); die;
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