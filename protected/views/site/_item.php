<tr>
    <td width="120px">
        <?php
        echo
        CHtml::link(
                CHtml::image(
                        Yii::app()->params['PRODUCT_IMAGE_LINK'] . '/' . $data->id . '.' . $data->image_extension, $data->title, array('width' => '100px', 'height' => '100px')
                ), $this->createUrl('products/view', array('id' => $data->id))
        );
        ?>
    </td>
    <td width="350px">
        <?php echo CHtml::link($data->title, $this->createUrl('products/view', array('id' => $data->id))) ?>
        <p><?php echo $data->description ?></p>
    </td>
    <td width="150px">
        <p><?php echo $data->firm->name ?></p>
    </td>
    <td width="100px">
        <p><?php echo $data->price ?></p>
    </td>
    <td>
        <?php
        echo CHtml::ajaxLink(
                'В корзину <i class="icon-trash icon-white"></i>', $this->createUrl('ajax/cart', array('id' => $data->id)), array(), array('class' => 'btn btn-success')
        )
        ?>
    </td>
</tr>