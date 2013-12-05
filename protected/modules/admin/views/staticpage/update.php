<?php
/* @var $this StaticpageController */
/* @var $model Staticpage */

$this->breadcrumbs=array(
	'Staticpages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Staticpage', 'url'=>array('index')),
	array('label'=>'View Staticpage', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Staticpage <?php echo $model->slug; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>