<?php 
require_once 'controllers/home.php';
session_start();
if ((isset ($_POST['formCheck'])) and (isset($_POST['formSubmit']))){
	setcookie('myCookie', 'userCookie', time()+3600*24*365); 
	header('Location: index.php'); die;}
userName();
index_home();

