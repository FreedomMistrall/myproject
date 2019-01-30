<?php
include_once'templates/header.php';

class AdminController
{
    public function index()
    {
        $model = new ItemModel();
        $items = $model->getDataItems();
        $data = [
            'items' => $items
        ];
        $this->view('admin', $data);
    }

    public function view($template,$data)
    {
        extract($data);
        include($template . '.php');
    }
}