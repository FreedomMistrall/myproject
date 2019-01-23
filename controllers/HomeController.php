<?php 

class HomeController extends Controller {
    public function index(){
        $model = new ItemModel();
        $items=$model->getDataItems();
        $data = [
        'items' => $items,
        'oneItem'=>$this->getId($items),
        'cookieOk' => $this->getCookie(),
        'last3ItemsId' => $this->last3ItemsId($items),
        ];
        $this->view('home',$data);
    }

    public function getId($items){
        if(isset($_GET['id'])){
            $items = array_filter($items,function($item){
        return $_GET['id'] === $item->id;
        });
        }
        return $items;
    }

    public function last3ItemsId($items){
        if(isset($_GET['id'])){
            if(!isset($_SESSION['itemsId'])){
                $_SESSION['itemsId'] = [];
            }
            array_unshift($_SESSION['itemsId'], $_GET['id']);
            }
        if (!empty($_SESSION['itemsId'])) {
        $_SESSION['itemsId'] = array_unique($_SESSION['itemsId']);
        $_SESSION['itemsId'] = array_slice($_SESSION['itemsId'],0,3);
        }
        $itemId = [];
        if (isset($_SESSION['itemsId'])){
            foreach ($_SESSION['itemsId'] as $value) {
                foreach ($items as $item) {
                    if ($value == $item->id) {
                        $itemId[] = $item;
                    }
                }
            }
        }return $itemId;
   }
   
    public function getCookie(){
        if (isset($_COOKIE['myCookie'])){
            return true;
        }
    }
}
