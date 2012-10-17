
<?php

$checkboxes = CHtml::checkBoxList(
        'firm', (isset($_GET['firm'])) ? $_GET['firm'] : '', 
        CHtml::listData(Firm::model()->findAll(), 'id', 'name'), 
        array(
            'class' => 'firm-filter',
            'separator'=>'',
            'template' => '<span class="firm-block">{label}{input}</span>',
        )
);

$widget = $this->widget('zii.widgets.CListView', array(
    'dataProvider' => Product::model()->search(10),
    'itemView' => '_item',
    'id' => 'ajaxListView',
    'template' => '{sorter}<br />
        <table class="table table-striped product-list">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Название товара</th>
                    <th>Производитель</th>
                    <th>Цена, грн</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {items}
            </tbody>
        </table>
        {pager}',
    'enableSorting' => true,
    'pager' => array(
        'header' => 'Страницы: ',
        'maxButtonCount' => 5,
        'lastPageLabel' => '>>',
        'firstPageLabel' => '<<',
        'nextPageLabel' => '>',
        'prevPageLabel' => '<',
    ),
    'emptyText' => 'По Вашему запросу товаров не найдено',
    'sorterHeader' => 'Производители: '.$checkboxes.'Сортировать по: ',
    'sortableAttributes' => array(
        'title' => 'По имени',
        'price' => 'По цене',
        'firm_id' => 'По производителю',
    ),
        ));
?>