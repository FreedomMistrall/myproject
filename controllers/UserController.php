<?php

class UserController extends Controller
{
    use Validation;

    protected $model;

    function __construct()
    {
        $this->model = new UserModel();

        saveUrl($_SERVER['REQUEST_URI']);
        if(!Auth::userId()) {
            redirect('/login/login');
        }
    }

    public function user()
    {
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        if (isset($_POST['edit'])) {
            redirect('/user/edit');
        }

        $this->view('userprofile', $data);
    }

    public function edit()
    {
        $user = Auth::user();

        if (!empty($_POST['submit'])){
            $err1 = $this->validation($user);
            $err2 = $this->checkProfile($user);
            $errors = array_merge($err1,$err2);
            if (!empty($errors)){
                $error = implode(';', $errors);
                $errors = str_replace(';', "<br>",$error);
                splashMessage($errors,'alert-danger');
                $oldData = [
                    'username' => $_POST['username']
                ];
                oldData($oldData);
                redirect('/user/edit');
            }else {
                $this->сhangeProfile();
                redirect('/user/user');
            }
        }
        $data = [
            'user' => $user,
        ];
        $this->view('editprofile', $data);
    }

    public function сhangeProfile()
    {
        $user = Auth::user();
        if (!empty($_FILES['img_url']['name'])) {
            $uploaddir = 'assets/avatar/';
            $file = pathinfo($_FILES['img_url']['name']);
            $file = $file['extension'];
            $_FILES['img_url']['name'] = md5($user['id']) . '.' . $file;
            $uploadfile = $uploaddir . $_FILES['img_url']['name'];
            move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadfile);
            $avatar = $_FILES['img_url']['name'];
        }else{
            $avatar = null;
        }
        if (!empty($_POST['password'])){
            $password = md5($_POST['password']);
        }else{
            $password = null;
        }
        $username = $_POST['username'];
        $this->model->update($user['id'], $username, $password, $avatar);
        return true;
    }

}