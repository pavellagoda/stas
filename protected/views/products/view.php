<div class="product-description">
    <h2><?php echo $model->title; ?></h2>
    <div class="lineelement">
        <?php
        echo CHtml::image(
                Yii::app()->params['PRODUCT_IMAGE_LINK'] . '/' . $model->id . '.' . $model->image_extension, $model->title
        )
        ?>
    </div>
    <div class="lineelement">
        <div class="field">
            <div class="fieldname lineelement">Название: </div><div class="fieldvalue lineelement"><?php echo $model->title; ?></div>
            <div class="clear"></div>
        </div>
        <div class="field">
            <div class="fieldname lineelement">Жанр: </div><div class="fieldvalue lineelement"><?php echo implode(',', $model->getFirmNames()); ?></div>
            <div class="clear"></div>
        </div>
        <div class="field">
            <div class="fieldname lineelement">Цена: </div><div class="fieldvalue lineelement"><?php echo $model->price; ?> грн</div>
            <div class="clear"></div>
        </div>

        <div class="field">
            <?php
            echo CHtml::ajaxLink(
                    'Добавить в корзину <i class="icon-trash icon-white"></i>', $this->createUrl('ajax/cart', array('id' => $model->id)), array('success' => 'function(data){
                        $("li.cart a").html("Корзина("+data+")")
                    }'), array('class' => 'btn btn-success',)
            )
            ?>
        </div>
        <div class="description">
            <span>Описание:</span> <?php echo $model->description ?>
        </div>
    </div>
    <div class="clear"></div>
</div>