<?php

function saveUrl($data = false)
{
    if ($data) {
        $_SESSION['url'] = $data;
    }
    else{
        $url = $_SESSION['url'];
        $_SESSION['url'] = '';
        return $url;
    }
}

function redirect($param = false)
{
    if($param){
        $redirect = $param;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/' ;
    }
    header("Location:" . "$redirect");
    exit();
}

function debug($data)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function splashMessage($data = false, $class = 'info')
{
    if ($data) {
        $_SESSION['errors'] = $data;
        $_SESSION['error_class'] = $class;
    }
    else {
        $message['data'] = isset($_SESSION['errors']) ? $_SESSION['errors'] : '';
        $message['class'] = isset($_SESSION['error_class']) ? $_SESSION['error_class'] : '';
        $_SESSION['errors'] = '';
        $_SESSION['error_class'] = '';
        return $message;
    }
}

function oldData($data = false)
{
    if($data){
        $_SESSION['old_data'] = $data;
    }
    else{
        $message = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : '';
        $_SESSION['old_data'] = '';
        return $message;
    }
}

function routeUrl($name)
{
    $routes = [
        ['name' => 'home', 'url' => '/', 'do' => 'HomeController/index'],
        ['name' => 'show', 'url' => '/home/show', 'do' => 'HomeController/index'],

        ['name' => 'login', 'url' => '/login/index', 'do' => 'LoginController/login'],
        ['name' => 'registr', 'url' => '/login/registr', 'do' => 'LoginController/registr'],
        ['name' => 'logout', 'url' => '/login/logout', 'do' => 'LoginController/logout'],

        ['name' => 'user', 'url' => '/user/index', 'do' => 'UserController/user'],
        ['name' => 'user', 'url' => '/user/edit', 'do' => 'UserController/edit'],

        ['name' => 'admin', 'url' => '/admin/show', 'do' => 'AdminController/show'],
        ['name' => 'edit', 'url' => '/admin/edit', 'do' => 'AdminController/add'],
        ['name' => 'deleteAdmin', 'url' => '/admin/delete', 'do' => 'AdminController/delete'],

        ['name' => 'category', 'url' => '/category/show', 'do' => 'CategoryController/show'],
        ['name' => 'editCategory', 'url' => '/category/edit', 'do' => 'CategoryController/add'],
        ['name' => 'deleteCategory', 'url' => '/category/delete', 'do' => 'CategoryController/delete'],

        ['name' => 'cart', 'url' => '/cart/show', 'do' => 'CartController/show'],
        ['name' => 'add', 'url' => '/cart/add', 'do' => 'CartController/addCart'],
        ['name' => 'deleteCart', 'url' => '/cart/delete', 'do' => 'CartController/deleteCart'],
        ['name' => 'order', 'url' => '/order/show', 'do' => 'CartController/order'],

        ['name' => 'product', 'url' => '/product/show', 'do' => 'OneItemController/show'],
        ['name' => 'imageShow', 'url' => '/image/show', 'do' => 'ImagesController/show'],
    ];
    foreach ($routes as $route){
        if($name == $route['name']){
            return $route['url'];
        }
    }
}

function route($name,$params=[])
{
    $routeName = routeUrl($name) . '?';
    if($params == null){
        return rtrim($routeName, '?');
    }
    foreach ($params as $key => $param) {
        $routeName .= $key . '=' . $param . '&';
    }
    return rtrim($routeName, '&');
}

function sendMail($data)
{
    $transport = (new Swift_SmtpTransport('smtp.ukr.net', 465, 'ssl'))
        ->setUsername('mistrall911@ukr.net')
        ->setPassword('20048711321');

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    extract($data);
/* Помещаем заготовку письма в буфер */
    ob_start();
    require 'templates/orderProduct.php';
    $some = ob_get_clean();
/* Помещаем заготовку письма в буфер */
    $message = (new Swift_Message("Заказ № $orderId"))
        ->setFrom(['mistrall911@ukr.net' => 'Shop'])
        ->setTo(["$email" => "$name"])
        ->setBody("$some", 'text/html');

// Send the message
    $result = $mailer->send($message);
    return $result;
}

function view($template)
{
    include('templates/'.$template.'.php');
}