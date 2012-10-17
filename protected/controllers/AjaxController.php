<?php

class AjaxController extends Controller
{

    public $firms;

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionCart()
    {
        $session = Yii::app()->session;
        if (isset($session['cart'])) {
            $array = $session['cart'];
        } else {
            $array = array();
        }
        
        $array[] = Yii::app()->request->getParam('id');
        $session['cart'] = $array;
        
        $result = Cart::getCountElements();
        
        echo $result;
    }

}