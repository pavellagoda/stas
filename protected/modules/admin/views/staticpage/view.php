<?php
/* @var $this StaticpageController */
/* @var $model Staticpage */

$this->breadcrumbs = array(
    'Staticpages' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Staticpage', 'url' => array('index')),
    array('label' => 'Update Staticpage', 'url' => array('update', 'id' => $model->id)),
);
?>

<h1>View Staticpage #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'slug',
        'content' => array(
            'name' => 'content',
            'type' => 'html'
        ),
    ),
));
?>
