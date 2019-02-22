<?php 
session_start();
require_once 'config/config.php';
include_once 'core/function.php';
require_once 'vendor/autoload.php';

spl_autoload_register('searchClass');
function searchClass($class_name)
{
    $folder = ['models', 'controllers', 'controllers/admin', 'core'];
    foreach ($folder as $path) {
        if (file_exists( $path .'/' . $class_name . '.php')) {
            return include_once $path . '/' . $class_name . '.php';
        }
    }
}

if ((isset ($_POST['formCheck'])) and (isset($_POST['formSubmit'])))
{
	setcookie('myCookie', 'userCookie', time()+3600*24*365); 
	header('Location: / ');
	exit();
}

$config = config('db');
$db = Database::getInstance($config);
$db_connect = $db->connection;
$db_pdo = $db->pdo;

$routes = [
    ['name' => 'home', 'url' => '', 'do' => 'HomeController/index'],
    ['name' => 'show', 'url' => '/home/show', 'do' => 'HomeController/index'],
    ['name' => 'login', 'url' => '/login/login', 'do' => 'LoginController/login'],
    ['name' => 'registr', 'url' => '/login/registr', 'do' => 'LoginController/registr'],
    ['name' => 'logout', 'url' => '/login/logout', 'do' => 'LoginController/logout'],
    ['name' => 'user', 'url' => '/user/user', 'do' => 'UserController/user'],
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

function remove($url)
{
    if($url) {
        $params = explode('?', $url,2);
        if(strpos($params[0], '=') === false) {
            return rtrim($params[0],'/');
        }
        else {
            return '';
        }
    }
};

$query = remove(rtrim($_SERVER['REQUEST_URI'],'/'));
$route = array_filter($routes, function ($el) use($query)
{
    return ($el['url'] == $query);
});
$route = (array_values($route))[0];
list($contoller, $action) = explode('/', $route['do']);
$c = new $contoller();
$c->$action();
