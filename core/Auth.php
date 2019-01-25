<?php

class Auth
{
    protected static $user;

    public static function login($id)
    {
        $_SESSION['loginId'] = $id;
    }

    public static function logout()
    {
        unset($_SESSION['loginId']);
    }

    public static function user()
    {
        $model = new UserModel();
        $id = self::userId();
        if(!$id)
        {
            return false;
        }
        if (!self::$user)
        {
            self::$user = $model->readId($id);
        }
        return self::$user;
    }

    public static function isAdmin()
    {
        $user = self::user();
        if ($user['role'] != 'admin')
        {
            return false;
        }
        return true;
    }

    public static function userId()
    {
        if(isset($_SESSION['loginId']))
        {
            return $_SESSION['loginId'];
        }
        return false;
    }
}