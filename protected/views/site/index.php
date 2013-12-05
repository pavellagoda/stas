<div class="left-part lineelement">
    <h2>Жанры</h2>
    <div>
        <?php
        echo CHtml::checkBoxList(
                'firm', (isset($_GET['firm'])) ? $_GET['firm'] : '', CHtml::listData(Firm::model()->findAll(), 'id', 'name'), array(
            'class' => 'firm-filter',
            'separator' => '',
            'template' => '<div class="firm-block">{input} {label}</div>',
                )
        );
        ?>
    </div>

    <div id="searchbox">
        <form action="" method="get">
            <label for="searchcondition"><h4>Поиск:</h4></label>
            <input type="text" name="searchcondition" id="searchcondition"/>
        </form>
    </div>
</div>

<div class="right-part lineelement right">
    <?php
    $widget = $this->widget('application.components.CListViewCustom', array(
        'dataProvider' => $data,
        'itemView' => '_item',
        'id' => 'ajaxListView',
        'template' => '{items}{pager}',
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
        'sorterHeader' => 'Сортировать по: ',
        'sortableAttributes' => array(
            'title' => 'По имени',
            'price' => 'По цене',
            'firm_id' => 'По производителю',
        ),
    ));
    ?>
</div>