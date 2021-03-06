<?php

class DefaultController extends AdminController
{

    public function actionIndex()
    {
        $this->menu = array();
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        
        $this->layout = 'empty';
        $model = new LoginForm();

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect("/admin/default");
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect("/admin");
    }

}