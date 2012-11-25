<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список товаров', 'url'=>array('index')),
);
?>

<h1>Товар</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>