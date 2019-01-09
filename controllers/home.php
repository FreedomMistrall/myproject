<?php 
class HomeController
{
    public function index(){
        include_once 'models/model.php';
        include_once 'templates/header.php';
            $model = new Model();
            $items=$model->getDataItems();
            $items=$this->getId($items);
            $this->getItemsId();
        include_once 'templates/home.php';
        include_once 'templates/footer.php';
    }

    public function getId($items){
        if(isset($_GET['id'])){
            $items = array_filter($items,function($item){
        return $_GET['id'] === $item->id;
        });
        }
        return $items;
    }

    public function getItemsId(){
        if(isset($_GET['id'])){
            if(!isset($_SESSION['itemsId'])){
                $_SESSION['itemsId'] = array();
            }
            array_unshift($_SESSION['itemsId'], $_GET['id']);
            }
        if (!empty($_SESSION['itemsId'])) {
            $_SESSION['itemsId'] = array_unique($_SESSION['itemsId']);
            $_SESSION['itemsId'] = array_slice($_SESSION['itemsId'],0,3);
        }
    }
}    


class Users
{
    public function userName(){
        if (isset($_POST['userName'])) {
          $_SESSION ['name'] = $_POST['userName'];
        }
        if (isset($_SESSION ['name']) and  (!empty(trim($_SESSION['name'])))) { ?>
        <div style ="color: #000000;"><b> <?php echo "Привет " . $_SESSION ['name'] . " !";?></b> </div>
            <form action="" method="get">
            <input type="submit" name="exit" value="Выход"></form>
<?php   }else{ include 'templates/components/form.php'; 
        }
        
    }
    public function getDataCookie(){
        if (!isset($_COOKIE['myCookie'])){
            include 'templates/components/cookie.php';
        }
    }
}
