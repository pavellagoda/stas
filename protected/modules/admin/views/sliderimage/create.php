<?php
/* @var $this SliderimageController */
/* @var $model SliderImage */

$this->breadcrumbs = array(
    'Slider Images' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List SliderImage', 'url' => array('index')),
);
?>

<h1>Create SliderImage</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>