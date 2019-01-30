<?php

trait Validation
{
    public function checkRegister()
    {
        $email = $_POST['email'];
        $user = $this->model->read(['email' => $email]);
        $errors = array();
        if (empty($_POST['email'])) {
            $errors [] = "E-mail не может быть пуст!";
        }
        if ($_POST['email'] == $user['email']){
            $errors [] = "Пользователь с таким E-mail уже существует!";
        }
        if (empty(trim($_POST['username']))) {
            $errors [] = "Логин не может быть пуст!";
        }
        if (strlen($_POST['username']) < 4) {
            $errors [] = "Имя пользователя не может быть меньше 4-х символов!";
        }
        if (empty($_POST['password'])) {
            $errors [] = "Пароль не может быть пуст!";
        }
        return $errors;
    }
}