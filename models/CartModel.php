<?php

class CartModel extends Model
{
    protected $table = 'cart';

    public function create()
    {
        $user_id = Auth::userId();
        $product_id = $_POST['product_id'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $stmt = $this->connect->prepare("INSERT INTO cart (user_id, product_id, price, count) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiii', $user_id, $product_id, $price, $count);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }

    public function readCart($id)
    {
        $stmt = $this->connect->prepare("SELECT c.*,p.name FROM cart AS c JOIN products AS p ON p.id = c.product_id WHERE c.user_id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $result = $res->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}