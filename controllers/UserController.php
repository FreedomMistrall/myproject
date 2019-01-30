<?php

class UserController extends Controller
{
    function __construct()
    {
        $this->model = new UserModel();
    }

    public function user()
    {
        $user = Auth::user();

        saveUrl();
        if(!$user) {
            redirect('/login/login');
        }
        unset($_SESSION['url']);
        $data = [
            'user' => $user,
        ];
        if(isset($_POST['edit'])) {

            $this->view('editprofile', $data);

        }
        else {
            $this->сhangeProfile();

            $this->view('userprofile', $data);

        }
    }

    public function сhangeProfile()
    {
        $user = Auth::user();
        if(isset($_POST['submit'])) {
            if (!empty($_FILES['img_url']['name'])) {
                $uploaddir = 'assets/avatar/';
                $file = pathinfo($_FILES['img_url']['name']);
                $file = $file['extension'];
                $_FILES['img_url']['name'] = md5($user['id']) . '.' . $file;
                $uploadfile = $uploaddir . $_FILES['img_url']['name'];
                move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadfile);
                $avatar = $_FILES['img_url']['name'];
            }
            else{
                $avatar = null;
            }
            $username = $_POST['login'];
            var_dump($username);
            $user = $this->model->update($user['id'], $username, $avatar);
        }
        return $user;
    }

}