<?php 
session_start();
require_once 'config/config.php';
include_once 'core/function.php';

spl_autoload_register(function ($class_name) {
    if(file_exists('models/' . $class_name . '.php')){
        include 'models/' . $class_name . '.php';
    } elseif(file_exists('controllers/' . $class_name . '.php')) {
        include 'controllers/' . $class_name . '.php';
    }else{
        include 'core/' . $class_name . '.php';
    }
});

if ((isset ($_POST['formCheck'])) and (isset($_POST['formSubmit']))){
	setcookie('myCookie', 'userCookie', time()+3600*24*365); 
	header('Location: index.php'); exit();}


$config = config('db');
$db = Database::getInstance($config);
$db_connect = $db->connection;

$routes = [
    ['url' => '', 'do' => 'HomeController/index'],
    ['url' => 'login', 'do' => 'LoginController/login'],
    ['url' => 'registration', 'do' => 'LoginController/register'],
    //['url' => 'admin', 'do' => 'AdminController/index']

];
function remove($url){
    if($url){
        $params = explode('&', $url,2);
        if(false === strpos($params[0], '=')){
            return rtrim($params[0],'/');
        }else{
            return '';
        }
    }
};

$query = remove(rtrim($_SERVER['QUERY_STRING'],'/'));


 
$route = array_filter($routes, function ($el) use($query) {
    return ($el['url'] == $query);
});
$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);
$c = new $contoller();
$c->$action();
