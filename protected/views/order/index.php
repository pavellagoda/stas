<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
      
        'htmlOptions' => array(
            'class' => 'well'
        )
            ));
    ?>

    <div class="alert alert-info">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</div>


    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username'); ?>
    <?php echo $form->error($model, 'username', array('class' => 'alert alert-error')); ?>

    <?php echo $form->labelEx($model, 'telephone'); ?>
    <?php echo $form->textField($model, 'telephone'); ?>
    <?php echo $form->error($model, 'telephone', array('class' => 'alert alert-error')); ?>
    
    <?php echo $form->labelEx($model, 'email'); ?>
    <?php echo $form->textField($model, 'email'); ?>
    <?php echo $form->error($model, 'email', array('class' => 'alert alert-error')); ?>
    
    <?php echo $form->labelEx($model, 'comment'); ?>
    <?php echo $form->textArea($model, 'comment', array('style' => 'width:300px; height:150px')); ?>
    <?php echo $form->error($model, 'comment', array('class' => 'alert alert-error')); ?>

    <div class="form-actions">
        <?php echo CHtml::submitButton('Оформить заказ', array('class' => 'btn btn btn-primary')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->