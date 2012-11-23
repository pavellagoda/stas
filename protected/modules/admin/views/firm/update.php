<?php
$this->breadcrumbs=array(
	'Firms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список производителей', 'url'=>array('index')),
	array('label'=>'Создать производителя', 'url'=>array('create')),
	array('label'=>'Удалить производителя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Производитель <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>