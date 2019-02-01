<?php

class UserModel extends Model {
    
    protected $table = 'users';
    
    public function create(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $stmt = $this->connect->prepare("INSERT INTO users (email, username, password) VALUES (? ,? ,?)");
        $stmt->bind_param('sss', $email, $username, $password);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
    
    public function read(){
        $email = $_POST['email'];
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }

    public function update($id, $username, $password = null, $avatar = null)
    {
        $stmt = $this->connect->prepare("UPDATE users SET username = ? WHERE id = $id");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->insert_id;

        if($avatar != null) {
            $stmt = $this->connect->prepare("UPDATE users SET avatar = ? WHERE id = $id");
            $stmt->bind_param('s', $avatar);
            $stmt->execute();
            $result = $stmt->insert_id;
        }
        if ($password != null){
            $stmt = $this->connect->prepare("UPDATE users SET password = ? WHERE id = $id");
            $stmt->bind_param('s', $password);
            $stmt->execute();
            $result = $stmt->insert_id;
        }

        return $result;
    }
}