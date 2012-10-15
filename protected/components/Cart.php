<?php

class Cart
{
    public static function getCountElements() {
        $session = Yii::app()->session;
        if(isset($session['cart'])) {
            $count = count($session['cart']);
            if($count == 1) {
                $res = $count.' товар';
            } elseif($count > 1 && $count < 5) {
                $res = $count.' товара';
            } elseif($count > 4 && $count < 21) {
                $res = $count.' товаров';
            } elseif($count > 20) {
                if($count%10 == 1) {
                    $res = $count.' товар';
                } elseif($count%10 > 1 && $count%10 < 5){
                    $res = $count.' товара';
                } else {
                    $res = $count.' товаров';
                }
            }
            return $res;
        }
        return 0;
    }
}