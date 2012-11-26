<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список заказов', 'url'=>array('index')),
);
?>

<h1>Изменить заказ №<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>