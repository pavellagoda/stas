<?php
$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список заказов', 'url'=>array('index')),
	array('label'=>'Изменить заказ', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>Заказ №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'telephone',
		'email',
		'comment',
		'status',
                array(
                        'name'=>'Товары',
                        'type'=>'html',
                        'value'=>$model->getProductList(),
                ),
	),
)); ?>
