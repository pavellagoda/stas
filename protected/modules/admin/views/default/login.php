<?php
$this->pageTitle = Yii::app()->name . ' :: Admin :: Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1><?php echo CHtml::encode(Yii::app()->name); ?> Login</h1>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array(
            'class' => 'well'
        )
            ));
    ?>

    <div class="alert alert-info">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</div>


    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username'); ?>
    <?php echo $form->error($model, 'username', array('class' => 'alert alert-error')); ?>

    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password'); ?>
    <?php echo $form->error($model, 'password', array('class' => 'alert alert-error')); ?>

    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        Запомнить?
    </label>
    <?php echo $form->error($model, 'rememberMe'); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn btn-primary')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
