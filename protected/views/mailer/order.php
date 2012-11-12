Имя: <?php echo $post['username']; ?><br/>
Email: <?php echo $post['email']; ?><br/>
Телефон: <?php echo $post['telephone']; ?><br/>
Комментарий: <?php echo $post['comment']; ?><br/>

Заказ:
<br/>
<table class="order-table" border="1px">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Название</th>
            <th>Цена за шт, грн</th>
            <th>Количество, шт</th>
            <th>Общая цена</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i = 0;
            $total_sum = 0;
            foreach ($products as $product): 
                $i++;
                $sum = $product['count']*$product['model']->price;
                $total_sum += $sum;
            ?>
            <tr>
                <td style="padding: 5px 10px;"><?php echo $i; ?></td>
                <td style="padding: 5px 10px;"><?php echo $product['model']->title ?></td>
                <td style="padding: 5px 10px;"><?php echo $product['model']->price ?></td>
                <td style="padding: 5px 10px;"><?php echo $product['count'] ?></td>
                <td style="padding: 5px 10px;"><?php echo $sum ?></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Общая сумма заказа:</td>
                <td><?php echo $total_sum ?> грн</td>
            </tr>
    </tbody>
</table>