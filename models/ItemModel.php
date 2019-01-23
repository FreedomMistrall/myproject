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

