<?php

trait Validation
{
    public function validation($user)
    {
        $errors = [];
        if (empty(trim($_POST['username']))) {
            $errors [] = "Логин не может быть пуст!";
        }
        if (strlen($_POST['username']) < 3) {
            $errors [] = "Имя пользователя не может быть меньше 3-х символов!";
        }
        if (($_POST['password']) !== ($_POST['password2'])){
            $errors [] = "Пароли не совпадают!";
        }
        return $errors;
    }

    public function checkRegistr($user)
    {
        $errors = [];
        if (empty($_POST['email'])) {
            $errors [] = "E-mail не может быть пуст!";
        }
        if (isset($user['email'])){
            $errors [] = "Пользователь с таким E-mail уже существует!";
        }
        if (isset($user['username'])){
            $errors [] = "Пользователь с таким username уже существует!";
        }
        if (empty($_POST['password'])) {
            $errors [] = "Пароль не может быть пуст!";
        }
        return $errors;
    }

    public function checkProfile($user)
    {
        $errors = [];
        if (md5($_POST['nowpassword']) !== $user['password']){
            $errors [] = "Неверный текущий пароль!";
        }
        return $errors;
    }
}