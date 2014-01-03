<?php
/* @var $this SliderimageController */
/* @var $model SliderImage */

$this->breadcrumbs = array(
    'Slider Images' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Добавить картинку в слайдер', 'url' => array('create')),
);
?>

<h1>Manage Slider Images</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'slider-image-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'file' => array(
            'name' => 'file',
            'value' => 'CHtml::image(Yii::app()->params["SLIDER_IMAGE_LINK"] . "/" . $data->id . "." . $data->extension)',
            'type' => 'html'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}'
        ),
    ),
));
?>
