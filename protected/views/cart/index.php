<?php 
    $widget = $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $data,
    'itemView' => '_item',
    'id' => 'ajaxListView',
    'template' => '{sorter}<br />
        <table class="table table-striped product-list">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Название товара</th>
                    <th>Производитель</th>
                    <th>Цена за шт, грн</th>
                    <th>Количество</th>
                    <th>Общая цена, грн</th>
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
    'emptyText' => 'Ваша корзина пуста',
    ));
?>