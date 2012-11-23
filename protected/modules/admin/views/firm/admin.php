<?php
$this->breadcrumbs=array(
	'Firms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список производителей', 'url'=>array('index')),
	array('label'=>'Создать производителя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('firm-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Производители</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'firm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
