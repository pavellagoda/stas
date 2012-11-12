<?php

class ProductsController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionView($id)
    {
        $this->render('view', array('model' => $this->loadModel($id)));
    }

    public function loadModel($id)
    {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}