<?php
/* @var $this StaticpageController */
/* @var $model Staticpage */

$this->breadcrumbs = array(
    'Staticpages' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Staticpage', 'url' => array('index')),
);
?>

<h1>Manage Staticpages</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'staticpage-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'slug',
//        'content' => array(
//            'name' => 'content',
//            'type' => 'html'
//        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}'
        ),
    ),
));
?>
