<?php

class LoginController extends Controller {
    
    protected $model;
    
    function __construct() {
        $this->model = new UserModel();
    }
    public function login(){
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $user = $this->model->read(['email' => $email]);
            if(!$user) {
                redirect('login');
            }
            $password = $_POST['password'];
            if (md5($password) == $user['password']) {
                $_SESSION['login_user_id'] = $user['id'];
                
            redirect('/myproject');
            echo 'Hello '. $user['username'];
            } else {
                redirect('login');
            }
            
        } else {
            $data = [];
            $this->view('authorization', $data);
        }
    }
    public function register(){
        if (!empty($_POST)) {
            $errors = $this->checkRegister(); 
            var_dump($errors);
// валидация
            if (!empty($errors)) {
//                $oldData = [
//                    'email' => $_POST['email']
//                ];
              // redirect('registration');
            }else{
            $data = $_POST;
            $userId = $this->model->create($data);
            $_SESSION['login_user_id'] = $userId;
            redirect('/myproject');  
            }
            
        } else {
            $data = [];
            $this->view('registration', $data);
        }
    }
    
    public function checkRegister(){
            $errors = array();
                if(empty($_POST['email'])){
                    $errors[] = "E-mail не может быть пуст.";
                }
                if(strlen($_POST['username']) < 4){
                    $errors[] = "Имя пользователя должно быть не меньше 4-х символов.";
                }
                if(empty($_POST['password'])){
                    $errors[] = "Пароль не может быть пуст.";
                }
                return $errors;  
        }
                               
    
}
