<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список товаров', 'url'=>array('index')),
	array('label'=>'Создать товар', 'url'=>array('create')),
	array('label'=>'Обновить товар', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить товар', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Товар #<?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description' => array(
                    'name' => 'description',
                    'type' => 'html'
                ),
		'price',
		'firm_id' => array(
                    'name' => 'firm_id',
                    'value' => $model->firm->name
                ),
	),
)); ?>
