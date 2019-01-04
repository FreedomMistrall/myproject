<?php 
class HomeController
{
    public function index(){
        include_once 'models/model.php';
        include_once 'templates/header.php';
            $model = new Model();
            $items=$model->getDataItems();
            $images=$model->getDataImages();
            $items=getId($items);
        include_once 'templates/home.php';
        include_once 'templates/footer.php';
    }
}
    function getId($items){
        if(isset($_GET['id'])){
            $items = array_filter($items,'back');
        }
        return $items;
    }

    function back($item){
        return $_GET['id'] === $item->id;
    }


class Users
{
    function userName(){
        if (isset($_POST['userName'])) {
          $_SESSION ['name'] = $_POST['userName'];
        }
        if (isset($_SESSION ['name']) and  (!empty(trim($_SESSION['name'])))) { ?>
        <div style = "text-align:center;"><b> <?php echo "Привет " . $_SESSION ['name'] . " !";?></b> </div>
        <?php
        }else{
          include 'templates/components/form.php';
        }
    }
    function getDataCookie(){
        if (!isset($_COOKIE['myCookie'])){
            include 'templates/components/cookie.php';
        }
    }
}

if(isset($_GET['id'])){
if(!isset($_SESSION['itemsId'])){
    $_SESSION['itemsId'] = array();
}
array_unshift($_SESSION['itemsId'], $_GET['id']);
}
$_SESSION['itemsId'] = array_unique($_SESSION['itemsId']);
$_SESSION['itemsId'] = array_slice($_SESSION['itemsId'],0,3);




