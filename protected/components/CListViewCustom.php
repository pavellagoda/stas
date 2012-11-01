<?php

Yii::import('zii.widgets.CListView');

/**
 * Description of CustomLinkPager
 *
 * @author Pasha
 */
class CListViewCustom extends CListView
{

    public function renderItems()
    {
        echo CHtml::openTag($this->itemsTagName, array('class' => $this->itemsCssClass)) . "\n";
        $data = $this->dataProvider->getData();
        if (($n = count($data)) > 0) {
            $owner = $this->getOwner();
            $render = $owner instanceof CController ? 'renderPartial' : 'render';
            $j = 0;
            foreach ($data as $i => $item) {
                $data = $this->viewData;
                $data['index'] = $i;
                $data['data'] = $item;
                $data['widget'] = $this;
                $owner->$render($this->itemView, $data);
                if($i%3 == 2) {
                    echo CHtml::tag('div', array('class'=>'clear'), '');
                }
                if ($j++ < $n - 1)
                    echo $this->separator;
            }
        }
        else
            $this->renderEmptyText();
        echo CHtml::closeTag($this->itemsTagName);
        echo CHtml::tag('div', array('class'=>'clear'), '');
    }

}