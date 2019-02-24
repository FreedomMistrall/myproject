<?php include_once'header.php'; ?>

<p><a href="<?= route('home') ?>">На главную</a></p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Товар</th>
        <th scope="col">Цена</th>
        <th scope="col">Кол-во</th>
        <th scope="col">Общая сумма</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $prod):
        $summ = $prod['price'] * $prod ['count'];
        $count = $prod['count'];
        $total [] = $summ;
        $totalCount [] = $count;
    ?>
        <tr>
            <td><?= $prod['name'] ?></td>
            <td><?= $prod['price'] ?></td>
            <td><?= $prod ['count'] ?></td>
            <td><?= $summ ?></td>
            <td><a href="<?= route('deleteCart')?>/?id=<?=$prod['id']?>">Убрать</a></td>
        </tr>
    <?php endforeach; ?>
    <td></td>
    <td></td>
    <td><b>Товаров всего : <?= isset($totalCount) ? array_sum($totalCount) : '0'; ?> шт. </b></td>
        <td class="right b nowrap">
            <span id="total_cost"><b>Общая стоимость : <?= isset($total) ? array_sum($total) : '0'; ?> грн.</b></span>
        </td>
    </tbody>
</table>

<p align="center"><a href="<?= route('order')?>" >Оформить заказ</a></p>




<?php include_once'footer.php'; ?>