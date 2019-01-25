<?php

class UserController extends Controller
{
    public function some()
    {
        $user = Auth::user();
        $userAdmin = Auth::isAdmin();
        if(!$user)
        {
            redirect('login');
        }

        $data = [];
        $this->view('personaluser',$data);
    }

    public static function actionDownImg()
    {
        if(isset($_POST['submit']))
        {
            $img_url = $_FILES['img_url']['name'];
            $tmp_name_img= $_FILES['img_url']['tmp_name'];
            $size_img = $_FILES['img_url']['size'];
            debug($_FILES);

        }
        return true;
    }
}