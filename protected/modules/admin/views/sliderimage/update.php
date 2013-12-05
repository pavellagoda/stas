<?php
/* @var $this SliderimageController */
/* @var $model SliderImage */

$this->breadcrumbs = array(
    'Slider Images' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List SliderImage', 'url' => array('index')),
    array('label' => 'Create SliderImage', 'url' => array('create')),
);
?>

<h1>Update SliderImage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>