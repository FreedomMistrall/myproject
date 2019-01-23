<?php 
require_once '../config/config.php';
require_once '../core/database.php';
include_once 'AdminController.php';
require_once '../templates/header.php';

$config = config('db');
$db = Database::getInstance($config);
$db_connect = $db->connection;

$controller = new AdminController();
$controller->index();

?>