<div class="item lineelement">
    <?php
    echo
    CHtml::link(
            CHtml::image(
                    Yii::app()->params['PRODUCT_IMAGE_LINK'] . '/' . $data->id . '.' . $data->image_extension, $data->title
            ), $this->createUrl('products/view', array('id' => $data->seo_url))
    );
    ?>
    <div class="item-name">
        <?php echo $data->firm->name ?>, <?php echo CHtml::link($data->title, $this->createUrl('products/view', array('id' => $data->seo_url))) ?>
    </div>
    <div class="item-price">
        Цена: <?php echo $data->price ?> грн
    </div>
    <?php
    echo CHtml::ajaxLink(
            'В корзину <i class="icon-trash icon-white"></i>', $this->createUrl('ajax/cart', array('id' => $data->id)), array('success' => 'function(data){
                        $("li.cart a").html("Корзина("+data+")")
                    }'), array('class' => 'btn btn-success',)
    )
    ?>
</div>