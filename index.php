<?php 
session_start();
require_once 'config/config.php';
require_once 'core/database.php';
require_once 'controllers/Controller.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
include_once 'core/function.php';
include_once 'models/Model.php';
include_once 'models/ItemModel.php';
include_once 'models/UserModel.php';


if ((isset ($_POST['formCheck'])) and (isset($_POST['formSubmit']))){
	setcookie('myCookie', 'userCookie', time()+3600*24*365); 
	header('Location: index.php'); exit();}


$config = config('db');
$db = Database::getInstance($config);
$db_connect = $db->connection;

$routes = [
    ['url' => '', 'do' => 'HomeController/index'],
    ['url' => 'login', 'do' => 'LoginController/login'],
    ['url' => 'registration', 'do' => 'LoginController/register']
];
$query = rtrim($_SERVER['QUERY_STRING'],'/');
$route = array_filter($routes, function ($el) use($query) {
    return ($el['url'] == $query);
});
$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);
$c = new $contoller();
$c->$action();