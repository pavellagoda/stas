<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создать товар', 'url'=>array('create')),
);

?>

<h1>Управление товарами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'price',
                array( 'name'=>'firm_name', 'value'=>'implode(",",$data->getFirmNames())', 'header' => 'Жанр' ),
                'is_new' => array(
                    'name' => 'is_new',
                    'value' => '$data->is_new?"Да":"Нет"'
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
