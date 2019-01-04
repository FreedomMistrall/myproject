<?php 
class AdminController
{
 public function index(){
    include_once 'admin.php';
    include_once '../models/model.php';
    $itemObj = new Model();
    $items = $itemObj->getDataItems();

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
<?php } 
}?>