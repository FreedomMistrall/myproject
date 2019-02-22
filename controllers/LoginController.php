<?php

class LoginController extends Controller
{
    use Validation;

    protected $model;
    
    function __construct()
    {
        $this->model = new UserModel();
    }

    public function login()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $data =[
                'email' => $email,
            ];
            $user = $this->model->read($data);

            if(!$user) {
                $errors = 'Неверный E-mail.';
                splashMessage($errors,'alert-danger');
                redirect('/login/login');
            }

            $oldData = [
                'email' => $_POST['email']
            ];
            oldData($oldData);

            $password = $_POST['password'];
            if (md5($password) == $user['password']) {
                Auth::login($user['id']);
                $url = saveUrl();
                if(!empty($url)) {
                    redirect($url);
                }
                else {
                    redirect('/');
                }
            }
            else {
                $errors = 'Неверный пароль.';
                splashMessage($errors,'alert-danger');
                redirect('/login/login');
            }

        }
        else{
            $data = [];
            $this->view('authorization', $data);
        }
    }
    public function registr()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $data =[
                'email' => $email,
            ];
            $user = $this->model->read($data);
            $err = $this->validation($user);
            $err2 = $this->checkRegistr($user);
            $errors = array_merge($err,$err2);
            if (!empty($errors)) {
                $error = implode(';', $errors);
                $errors = str_replace(';', "<br>",$error);
                splashMessage($errors,'alert-danger');
                $oldData = [
                    'email' => $_POST['email'],
                    'username' => $_POST['username']
                ];
                oldData($oldData);
                redirect('/login/registr');
            }else{
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password
                ];
                $userId = $this->model->create($data);
                $_SESSION['login_user_id'] = $userId;
                redirect('/');
            }
        }
        $data = [];
        $this->view('registration', $data);
    }

    public function logout()
    {
        Auth::logout();
        redirect('/');
    }

}
