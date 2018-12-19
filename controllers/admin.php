<?php 
include_once 'models/model.php';
include_once 'templates/admin.php';
function index_admin($items){
   foreach ($items as $item) { ?>
    <tr>
        <th scope="row"><?php echo $item['id'] ?></th>
        <td><?php echo $item['name'] ?></td>
        <td><?php echo $item['price'] ?></td>
        <td><?php echo $item['stock'] ?></td>
        <td><?php echo $item['disc'] ?></td>
    </tr>
<?php } ?>
    </tbody>
<?php } ?>