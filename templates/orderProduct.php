<html>
    <body>
        <table border="10" width="100%">
            <caption><h2 align="center"> Заказ #<?=$orderId ?></h2></caption>
            <tr>
                <th>Товар</th>
                <th>Кол-во</th>
                <th>Общая цена</th>
            </tr>
            <tr>
                <?php
                    foreach ($cart as $prod):
                    $summ = $prod['price'] * $prod ['count'];
                    $count = $prod['count'];
                    $total [] = $summ;
                    $totalCount [] = $count;
                ?>
                <td><p align="center"><?= $prod['name'] ?></p></td>
                <td><p align="center"><?= $prod ['count'] ?></p></td>
                <td><p align="center"><?= $summ ?></p></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td></td>
                <td><p align="center"><b>Товаров всего: <?= isset($totalCount) ? array_sum($totalCount) : '0'; ?> шт.</b></p></td>
                <td><p align="center"><b>Общая стоимость: <?= isset($total) ? array_sum($total) : '0'; ?> грн.</b></p></td>
            </tr>
        </table>
    </body>
</html>