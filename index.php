<?php 
session_start();
require_once 'config/config.php';
require_once 'core/database.php';
require_once 'controllers/home.php';
require_once 'templates/navibar.php';

if ((isset ($_POST['formCheck'])) and (isset($_POST['formSubmit']))){
	setcookie('myCookie', 'userCookie', time()+3600*24*365); 
	header('Location: index.php'); exit();}

$config = config('db');
$db = Database::getInstance($config);
$db_connect = $db->connection;

$controller = new HomeController();
$controller->index();
