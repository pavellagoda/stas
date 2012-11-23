<?php
$this->breadcrumbs=array(
	'Производители',
);

$this->menu=array(
	array('label'=>'Создать производителя', 'url'=>array('create')),
);
?>

<h1>Firms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
