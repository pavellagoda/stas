<?php

class StatisticController extends AdminController
{

    public function actionIndex()
    {
        $result = Yii::app()->db->createCommand()
                ->select('SUM(`count`) as count, product_id, p.*, f.name as firm_name')
                ->from('orders_products op')
                ->join('products p', 'op.product_id=p.id')
                ->join('firms f', 'p.firm_id=f.id')
                ->group('product_id')
                ->order('count DESC')
                ->queryAll();
        
        $orders_sum  = Yii::app()->db->createCommand()
                ->select('SUM(`count` * price) as sum')
                ->from('orders_products op')
                ->queryScalar();
        
        $this->render('index', array('result' => $result, 'sum' => $orders_sum));
    }

}