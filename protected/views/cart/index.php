<?php 

    $template = $data->itemCount?'<table class="table table-striped product-list">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Название товара</th>
                    <th>Производитель</th>
                    <th>Цена за шт, грн</th>
                    <th>Количество</th>
                    <th>Цена, грн</th>
                    <th>
                        Общая сумма<br/>
                        (<span class="total-sum">'.$sum.'</span> грн)<br/>
                        <a class="total-sum-order btn btn-warning" href="/order">Заказать <i class="icon-ok icon-white"></i></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                {items}
            </tbody>
        </table>
        {pager}':'Ваша корзина пуста';
    $widget = $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $data,
    'itemView' => '_item',
    'id' => 'ajaxListView',
    'template' => $template,
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