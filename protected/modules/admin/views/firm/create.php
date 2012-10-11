<?php
$this->breadcrumbs=array(
	'Firms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список производителей', 'url'=>array('index')),
);
?>

<h1>Создать производителя</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>