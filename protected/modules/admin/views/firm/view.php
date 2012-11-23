<?php
$this->breadcrumbs=array(
	'Firms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список производителей', 'url'=>array('index')),
	array('label'=>'Создать производителя', 'url'=>array('create')),
	array('label'=>'Обновить производителя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить производителя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Производитель <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
