<?php

class OrderModel extends Model
{
    public function createOrder($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO orders (name, phone, address, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute($data);
        $result = $this->pdo->lastInsertId();
        return $result;
    }

    public function createOrderProduct($data,$orderId)
    {
        $stmt = $this->pdo->prepare("INSERT INTO order_product (order_id, product_id, count, price) VALUES (?, ?, ?, ?)");
        foreach ($data as $val){
            $orderProduct = [$orderId, $val['product_id'], $val['count'],$val['price']];
            $stmt->execute($orderProduct);
        }
    }
}