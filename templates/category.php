<?php include_once'header.php'; ?>

<p style="margin-left: 10px;"><a href="<?= route('admin') ?>">Назад</a></p>
<br><br><br>
<p style="margin-left: 10px;"><a href="<?= route('editCategory') ?>">Добавить</a></p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach ($result as $category): ?>
        <tr>
            <td scope="row"><?= $category['id']?></td>
            <td><a href="<?= route('editCategory', ['id'=>$category['id']])?>"><?= $category['category']?></a></td>
            <td><a href="<?= route('deleteCategory', ['id'=>$category['id']])?>"> Удалить</a></td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>