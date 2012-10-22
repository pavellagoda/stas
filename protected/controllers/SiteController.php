<?php

class SiteController extends Controller
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
    public function actionIndex()
    {
//        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile('/js/index.js', CClientScript::POS_HEAD);

        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {

            $criteria = new CDbCriteria;
            if ($request->getParam('firm')) {
                $firms = implode($request->getParam('firm'), ',');
                $criteria->condition = "firm_id IN (".$firms.")";
            }
            $dataProvider = new CActiveDataProvider('Product', array(
                        'criteria' => $criteria,
                        'pagination' => array(
                            'pageSize' => 10,
                        ),
                    ));
        } else {
            $dataProvider = Product::model()->search(10);
        }

        $this->render('index', array('data' => $dataProvider));
    }

    public function productsAction()
    {
        
    }

}