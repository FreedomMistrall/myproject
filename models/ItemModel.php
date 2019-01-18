<?php

class ItemModel extends Model {
    
    protected $table = 'items';
    
    function getDataItems(){
    $result = $this->connect->query('SELECT * FROM products');
    $dataItems = $result->fetch_all(MYSQLI_ASSOC);

    $dataItemsObj = [];
        foreach ($dataItems as $item) {
            $dataItemsObj[] = new Item($item);
        }
        return $dataItemsObj;
    }
}

class Item {
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $description;
    public $img;

    function __construct($item){
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->count = $item['stock'];
        $this->disc = $item['disc'];
        $this->price = $this->getPrice($item['price']);
        $this->description = $item['description'];
        $this->img = $item['image'];
        $this->img = $this->getNoImage($item['image']);
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
    
    protected function getNoImage(){
        $img = $this->img;
        if(!$this->img){
            $img = 'https://b.radikal.ru/b06/1901/33/29c551ee879e.png';
        }return $img;
    }
}