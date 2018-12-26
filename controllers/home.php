<?php 
include_once 'models/model.php';

function index_home(){
include_once 'templates/header.php';

$items = get_data_items();
$images = get_data_images();
$items = write_arr_priceDisc_image($items,$images);
$items = getId($items);
$description  =  " Некоторый быстрый пример текста, который будет основан на названии карты и составляет основную часть содержимого карты. " ;
include_once 'templates/home.php';
include_once 'templates/footer.php';

}

function get_price($item){
    $stock = $item['stock'];
    $price = $item['price'] - ($item['price'] * $item['disc'] / 100) . ' грн.' ;
        if ($stock <= 2){
                $price = (float) $item['price'] . ' грн.';
            }
        if ($stock == 0){
                $price = 'Нет в наличии';
            }
        return $price;
}

function get_image($images,$item){
    $noImage = 'https://d.radikal.ru/d41/1812/16/2c886ced25f5.png';
    foreach ($images as $image) {
        if ($item['id'] == $image['id']){
                $img = $image['img'];
                break;
        }else{
            $img = $noImage;
        }
    }return $img;
}

function write_arr_priceDisc_image($items,$images){
    $result = [];
    foreach ($items as $item) {
        $item['priceDisc'] = get_price($item);
        $item['img'] = get_image($images,$item);
        $result[] = $item;
    }
    return $result;
}

function getId($items){
    if(isset($_GET['id'])){
        $items = array_filter($items,"back");
    }
    return $items;
}

function back($item){
    return $_GET['id'] === $item['id'];
}

function userName(){
    if (isset($_POST['userName'])) {
      $_SESSION ['name'] = $_POST['userName'];
    }
    if (!empty($_SESSION ['name'])) { ?>
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
