<?php

class Item {
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $fullDescription;
    public $description;
    public $category_id;
    public $img;

    function __construct($item){
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->category_id = $item['category_id'];
        $this->count = $item['stock'];
        $this->disc = $item['disc'];
        $this->price = $this->getPrice($item['price']);
        $this->fullDescription = $item['fullDescription'];
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
            $img = 'No_image.jpg';
        }return $img;
    }
}