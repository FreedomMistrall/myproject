<?php

class CategoryModel extends Model
{
    protected $table = 'category';

    public function create($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO category (category) VALUES (?)");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function update($id,$data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE category SET category =? WHERE id = $id");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
    public function read()
    {
        $result = $this->connect->query("SELECT * FROM category");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}