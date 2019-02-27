<?php

class ItemModel extends Model {
    
    protected $table = 'products';

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

    public function listItems($filter = [], $fields = null, $order = null, $limit = null, $offset = null)
    {
        $sql = " FROM $this->table ";
        if (!empty($filter)) {
            $sql = $sql . ' WHERE ';
            if (key_exists('cat', $filter)) {
                $sql .= 'category_id = ? AND ';
            }
            if (key_exists('priceMin', $filter)) {
                $sql .= "price > {$filter['priceMin']} AND ";
            }
            if (key_exists('priceMax', $filter)) {
                $sql .= " price < {$filter['priceMax']} AND ";
            }
            if (key_exists('search', $filter)) {
                $sql .= 'name LIKE "%' . $filter['search'] . '%"';
            }
            $sql = rtrim($sql, 'AND ');
        }
        if ($order){
            $sql = $sql . ' ORDER BY ';
            if (key_exists('min', $order)) {
                $sql .= 'price ASC';
            }
            if (key_exists('max', $order)) {
                $sql .= ' price DESC';
            }
            if (key_exists('new', $order)) {
                $sql .= ' id DESC';
            }
        }
        if ($limit){
            $sql = $sql . ' LIMIT ' . $limit;
            if($offset) {
                $sql .= ' OFFSET ' . $offset;
            }
        }
        if(!$fields) {
            $fields = ['*'];
        }
        if ($fields) {
            if ($fields == 'count') {
                $sql = 'SELECT COUNT(*) AS count ' . $sql;
            } elseif ($fields == 'min') {
                $sql = 'SELECT MIN(price) AS min ' . $sql;
            } elseif ($fields == 'max') {
                $sql = 'SELECT MAX(price) AS max ' . $sql;
            } else {
                $sql = 'SELECT ' . join(",", $fields) . $sql;

            }
        }

        $param = [];
        foreach ($filter as $k => $v){
            $param[] = $v;
        }
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($param);
        $data = $stmt->fetchAll();
        if ($fields == 'count' or $fields == 'min' or $fields == 'max') {
            return $data[0];
        }
        $dataItemsObj = [];
        foreach ($data as $item) {
            $dataItemsObj[] = new Item($item);
        }
        return $dataItemsObj;
    }
}

