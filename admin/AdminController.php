<?php
include_once '../models/Model.php';
include_once '../models/ItemModel.php';


class AdminController
{
    public function index(){
        $model = new ItemModel();
        $items = $model->getDataItems();
        $data = [
        'items' => $items
        ];
        $this->view('admin', $data);
    }

    public function view($template,$data){
        extract($data);
        include($template . '.php');
    }
}