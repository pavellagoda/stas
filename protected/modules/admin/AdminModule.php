<?php

class AdminModule extends CWebModule
{

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            $route = $controller->id . '/' . $action->id;
            $publicPages = array(
                'default/login',
            );
            if (Yii::app()->user->isGuest && !in_array($route, $publicPages)) {
                Yii::app()->request->redirect("/admin/default/login");
            } else {
                return true;
            }
        }
        else
            return false;
    }

}
