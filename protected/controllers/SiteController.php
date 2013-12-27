<?php

class SiteController extends Controller {

    public function actionAbout() {
        $this->render('about');
    }

    public function actionContacts() {
        $this->render('contacts');
    }

    public function actionPayment() {
        $this->render('payment');
    }

    public function actionIndex() {
        Yii::app()->clientScript->registerScriptFile('/js/index.js', CClientScript::POS_HEAD);
        $this->render('index', array('data' => $this->getDataProvider(false)));
    }

    public function actionNew() {
        Yii::app()->clientScript->registerScriptFile('/js/index.js', CClientScript::POS_HEAD);
        $this->render('index', array('data' => $this->getDataProvider(true)));
    }

    private function getDataProvider($is_new = false) {
        $criteria = new CDbCriteria;
        if ($is_new)
            $criteria->addCondition('is_new = 1');

        $request = Yii::app()->request;

        if ($request->isAjaxRequest) {
            if ($request->getParam('firm')) {
                $criteria->join = 'INNER JOIN products_firms pf ON pf.product_id = t.id';
                $criteria->addInCondition('pf.firm_id', $request->getParam('firm'));
                $criteria->group = 'id';
            }

            if (trim($request->getParam('search')) !== '') {
                $criteria->addCondition('title LIKE "%' . trim($request->getParam('search')) . '%" OR description LIKE "%' . trim($request->getParam('search')) . '%"');
            }
        }

        $criteria->order = 'id DESC';

        $dataProvider = new CActiveDataProvider('Product', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 12,
            ),
        ));

        return $dataProvider;
    }

}
