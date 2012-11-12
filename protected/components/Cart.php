<?php

class Cart
{

    public static function getCountElements()
    {
        $session = Yii::app()->session;
        if (isset($session['cart']) && count($session['cart'])) {
            $count = 0;
            foreach ($session['cart'] as $tmp) {
                $count += $tmp['count'];
            }
            if ($count == 1) {
                $res = $count . ' товар';
            } elseif ($count > 1 && $count < 5) {
                $res = $count . ' товара';
            } elseif ($count > 4 && $count < 21) {
                $res = $count . ' товаров';
            } elseif ($count > 20) {
                if ($count % 10 == 1) {
                    $res = $count . ' товар';
                } elseif ($count % 10 > 1 && $count % 10 < 5) {
                    $res = $count . ' товара';
                } else {
                    $res = $count . ' товаров';
                }
            }
            return $res;
        }
        return 0;
    }

    public static function getSum()
    {
        $session = Yii::app()->session;
        if (isset($session['cart']) && count($session['cart'])) {
            $sum = 0;
            
            $list = array_keys($session['cart']);
            $criteria=new CDbCriteria;
            $criteria->addInCondition('id', $list);
            
            $products = Product::model()->findAll($criteria);
            
            foreach ($session['cart'] as $id => $data) {
                foreach ($products as $product) {
                    if($id == $product->id) {
                        $sum += $product->price*$data['count'];
                    }
                }
            }
            return $sum;
        }
        return 0;
    }

}