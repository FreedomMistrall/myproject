<?php 
class Model 
{
    public $description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

    function getDataItems(){
    $db = Database::getInstance();
    $db_connect = $db->connection;
    $result = $db_connect->query('SELECT * FROM products');
    $dataItems = $result->fetch_all(MYSQLI_ASSOC);

    $dataItemsObj = [];
        foreach ($dataItems as $item) {
            $dataItemsObj[] = new Item($item);
        }
        return $dataItemsObj;
}


function getDataImages(){
$images = [
    ['id' => '1', 'img' => 'https://c.radikal.ru/c27/1812/51/0ab71bffd797.jpg'],
    ['id' => '2', 'img' => 'https://d.radikal.ru/d32/1812/0d/15d4dc782522.jpg'],
    ['id' => '3', 'img' => 'https://d.radikal.ru/d27/1812/fe/9fa572f8bb0a.jpg'],
    ['id' => '4', 'img' => 'https://c.radikal.ru/c15/1812/90/8a245b8b44d9.jpg'],
    ['id' => '7', 'img' => 'https://a.radikal.ru/a17/1812/72/c011bfc47d71.jpg'],
    ['id' => '8', 'img' => 'https://c.radikal.ru/c12/1812/70/634877a85140.jpg']
];
	return $images;

}
}

class Item
{
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $description;
    public $img;

    function __construct($item) {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->count = $item['stock'];
        $this->disc = $item['disc'];
        $this->price = $this->getPrice($item['price']);
        $this->description = $item['description'];
        $this->img = $item['img'];

    }
    protected function getPrice($price) {
        if ($this->count > 2){
                $price = $price - ($price * $this->disc / 100);
            }
        if ($this->count == 0){
                $price = 'Нет в наличии';
            }
        return $price;
    }
}


/*$items=$model->getDataItems();
$out = fopen('c://xampp/htdocs/myproject/assets/file/file.csv', 'w+');

foreach($items as $item){   
    fputcsv($out,$item,';');
}   

fclose($out);

$out = fopen('c://xampp/htdocs/myproject/assets/file/file.csv', 'r'); 
while (!feof($out)) { 
     $array[] = fgetcsv($out, 0, ";"); 
} 
array_pop($array);

*/