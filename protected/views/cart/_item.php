<tr>
    <td width="120px">
        <?php
        echo
        CHtml::link(
                CHtml::image(
                        Yii::app()->params['PRODUCT_IMAGE_LINK'] . '/' . $data['model']->id . '.' . $data['model']->image_extension, $data['model']->title, array('width' => '100px', 'height' => '100px')
                ), $this->createUrl('products/view', array('id' => $data['model']->id))
        );
        ?>
    </td>
    <td width="200px">
        <?php echo CHtml::link($data['model']->title, $this->createUrl('products/view', array('id' => $data['model']->id))) ?>
        <p><?php echo $data['model']->description ?></p>
    </td>
    <td width="150px">
        <p><?php echo $data['model']->firm->name ?></p>
    </td>
    <td width="150px">
        <p><?php echo $data['model']->price ?></p>
    </td>
    <td width="100px">
        <p><input type="text" item_id="<?php echo $data['model']->id ?>" class="items-count" value="<?php echo $data['count'] ?>"/> шт</p>
    </td>
    <td width="150px">
        <p><?php echo $data['model']->price * $data['count']; ?></p>
    </td>
    <td width="150px;">
        <?php
        echo CHtml::ajaxLink(
                'Удалить <i class="icon-trash icon-white"></i>',
                $this->createUrl('ajax/deleteitem', array('id' => $data['model']->id)), 
                array('success' => 'function(data){
                        window.location.href = "/cart";
                    }'),
                array('class' => 'btn btn-danger remove-element',)
        )
        ?>
    </td>
</tr>