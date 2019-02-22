<?php

class ImagesModel extends Model
{
    protected $table = 'images';

    public function create()
    {
        $stmt = $this->pdo->prepare("INSERT INTO images (image, product_id) VALUES (? , ?)");
        $stmt->execute();
        $result = $this->pdo->lastInsertId();
        return $result;
    }

    public function update($id,$image)
    {
        $stmt = $this->pdo->prepare("UPDATE images SET image = ? WHERE id = $id ");
        foreach ($image as $img){
            if ($img != '' && $img != 'Сохранить')
            $stmt->execute(array($img));
        }

        $result = $this->pdo->lastInsertId();
        return $result;
    }

    public function read($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM images WHERE product_id = ?");
        $stmt->execute(array($id));
        $data = $stmt->fetchAll();
        return $data;
    }
}