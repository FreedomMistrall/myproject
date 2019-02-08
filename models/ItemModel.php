<?php

class ItemModel extends Model {
    
    protected $table = 'products';
    
    public function getDataItems($start, $limit)
    {
    $result = $this->connect->query("SELECT * FROM products LIMIT $start, $limit");
    $dataItems = $result->fetch_all(MYSQLI_ASSOC);

    $dataItemsObj = [];
        foreach ($dataItems as $item) {
            $dataItemsObj[] = new Item($item);
        }
        return $dataItemsObj;
    }

    public function create()
    {
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $disc = $_POST['disc'];
        $image = $_POST['img'];
        $stmt = $this->connect->prepare("INSERT INTO products (name, description, price, stock, disc, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $disc = $_POST['disc'];
        $image = $_POST['img'];
        $stmt = $this->connect->prepare("UPDATE products SET name =?, description = ?, price = ?, stock = ?, disc = ?, image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
}

