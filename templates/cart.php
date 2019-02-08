<?php
include_once'header.php'; ?>
<p><a href="<?= route('home') ?>">На главную</a></p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Summ</th>
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
    <td><b>Товаров: <?= isset($totalCount) ? array_sum($totalCount) : '0'; ?> шт. </b></td>
        <td class="right b nowrap">
            <span id="total_cost"><b>Итого : <?= isset($total) ? array_sum($total) : '0'; ?></b></span>
        </td>
    </tbody>
</table>