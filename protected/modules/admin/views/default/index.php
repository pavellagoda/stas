<?php
$this->pageTitle=Yii::app()->name . ' :: Admin :: Главная';
$this->breadcrumbs=array(
	"Главная"
);
?>
<ul>
    <li><a href="<?php echo $this->createUrl('firm/') ?>"><h2>Управление жанрами</h2></a></li>
    <li><a href="<?php echo $this->createUrl('product/') ?>"><h2>Управление товарами</h2></a></li>
    <li><a href="<?php echo $this->createUrl('order/') ?>"><h2>Управление заказами</h2></a></li>
</ul>