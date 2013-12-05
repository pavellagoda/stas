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
        $model = Product::model()->findByAttributes(array('seo_url' => $id));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}