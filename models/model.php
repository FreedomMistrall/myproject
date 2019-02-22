<?php 
class Model {
    
    protected $connect;
    protected $pdo;
    protected $table;

    function __construct()
    {
        $db = Database::getInstance();
        $this->connect = $db->connection;
        $this->pdo = $db->pdo;
    }
    public function delete($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        return $result;
    }
    
    public function readId($id)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
    public function  count()
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
}
    