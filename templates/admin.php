<?php include_once'header.php'; ?>

<p style="margin-left: 10px;"><a href="<?= route('home') ?>">На главную</a></p>
<br>
<p style="margin-left: 10px;"><a href="<?= route('category') ?>">Добавить/Редактировать категории</a></p>
<br>
<p style="margin-left: 10px;"><a href="<?= route('edit') ?>">Добавить</a></p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Discount</th>
        <th scope="col">Image</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach ($items as $item): ?>
        <tr>
            <td scope="row"><?= $item->id ?></td>
            <td><a href="<?= route('edit', ['id'=>$item->id])?>"><?= $item->name ?></a></td>
            <td><?= $item->category_id?></td>
            <td><?= $item->description ?></td>
            <td><?= $item->price ?></td>
            <td><?= $item->count ?></td>
            <td><?= $item->disc ?></td>
            <td><a href="<?= route('imageShow', ['id'=>$item->id])?>"><?= $item->image ?></a></td>
            <td><a href="<?= route('deleteAdmin')?>/?id=<?=$item->id?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>