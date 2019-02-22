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

    public function create($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO products (name, description, price, stock, disc, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function update($id,$data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE products SET name =?, description = ?, price = ?, stock = ?, disc = ?, image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function listItems($filter = [], $fields = null)
    {
        $sql = " FROM $this->table ";
        if (!empty($filter)) {
            $sql = $sql . ' WHERE ';
            if (key_exists('cat', $filter)) {
                $sql .= 'category_id = ?';
                debug($sql);
            }
            if (key_exists('priceM', $filter)) {
                $sql .= 'price < ?';
            }
            /*
            if (key_exists('ids', $filter)) {
                $sql .= 'id IN ?';
                $filter['ids'] = "(". join(",", $filter['ids']) .")";
            }
            */
        }
        if(!$fields) {
            $fields = ['*'];
        }
        if ($fields) {
            if ($fields == 'count') {
                $sql = 'SELECT COUNT(*) '.$sql;
            } else {
                $sql = 'SELECT ' .join(",", $fields) .$sql;
            }
        }

        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }
}

