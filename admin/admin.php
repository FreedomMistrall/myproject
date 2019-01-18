<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Discount</th>
    </tr>
    </thead>
    <tbody>
<?php
 foreach ($items as $item) { ?>
        <tr>
            <th scope="row"><?php echo $item->id ?></th>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->price ?></td>
            <td><?php echo $item->count ?></td>
            <td><?php echo $item->disc ?></td>
        </tr>
    <?php } ?>
        </tbody>