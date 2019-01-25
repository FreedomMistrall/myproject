<?php

function redirect($param)
{
    header("Location:" . "$param");
    exit();
}

function debug($data)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function splashMessage($array=[],$oldData=[])
{
    $_SESSION['errors'] = $array;
    $_SESSION['oldData'] = $oldData;
}