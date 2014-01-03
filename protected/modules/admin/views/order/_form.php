<div class="form">
    <?php $products = $model->getProductList(false); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telephone'); ?>
        <?php echo $form->textField($model, 'telephone', array('size' => 25, 'maxlength' => 25)); ?>
        <?php echo $form->error($model, 'telephone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php echo $form->textArea($model, 'comment', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('pending' => 'В ожидании', 'rejected' => 'Отклонен', 'complete' => 'Завершен')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <?php if (is_array($products)) : ?>
        <table class="table admin-product-list">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название товара</th>
                    <th>Производитель</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>



                <?php
                $total_sum = 0;


                foreach ($products as $i => $product):
                    $total_sum += (float) $product['price'] * (int) $product['count'];
                    ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $product['product_model']->title ?></td>
                        <td><?php echo implode(',', $product['product_model']->getFirmNames()); ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo CHtml::textField('count[' . $product['order_product_id'] . ']', $product['count']) ?> шт</td>
                    </tr>


                <?php endforeach;
                ?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                    <td>Общая сумма:</td>
                    <td><?php echo $total_sum ?> грн</td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div><?php // echo $products; ?></div>
    <?php endif; ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->