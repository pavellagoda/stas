<?php
$this->breadcrumbs = array(
    'Статистика',
);
?>
<table class="table admin-product-list">
    <thead>
        <tr>
            <th colspan="3">&nbsp;</th>
            <th>Общая сумма заказов:</th>
            <th><?php echo $sum?$sum:0 ?> грн</th>
        </tr>
        <tr>
            <th>#</th>
            <th>Название товара</th>
            <th>Жанр</th>
            <th>Текущая цена, грн</th>
            <th>Количество заказов</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($result as $i => $product): ?>
            <tr>
                <td><?php echo $i + 1 ?></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo implode(',',Product::model()->findByPk($product['product_id'])->getFirmNames())  ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['count'] ?></td>
            </tr>
<?php endforeach; ?>
    </tbody>
</table>