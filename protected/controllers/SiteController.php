<?php

class SiteController extends Controller
{

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionContacts()
    {
        $this->render('contacts');
    }
    public function actionPayment()
    {
        $this->render('payment');
    }

    public function actionIndex()
    {
        Yii::app()->clientScript->registerScriptFile('/js/index.js', CClientScript::POS_HEAD);

        $request = Yii::app()->request;
        if ($request->isAjaxRequest) {

            $criteria = new CDbCriteria;
            if ($request->getParam('firm')) {
                $firms = implode($request->getParam('firm'), ',');
                $criteria->condition = "firm_id IN (" . $firms . ")";
            }
            $dataProvider = new CActiveDataProvider('Product', array(
                        'criteria' => $criteria,
                        'pagination' => array(
                            'pageSize' => 12,
                        ),
                    ));
        } else {
            $dataProvider = Product::model()->search(12);
        }

        $this->render('index', array('data' => $dataProvider));
    }
}