<?php 
include_once '../models/model.php';

class AdminController
{
    public function index(){

    $itemObj = new Model();
    $items = $itemObj->getDataItems();
    $data = [
    'items'=> $items
    ];
    $this->view('admin', $data);
    }

    public function view($template,$data){
    extract($data);
    include($template . '.php');
    }
}