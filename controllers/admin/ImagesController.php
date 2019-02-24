<?php

class ImagesController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new ImagesModel();
        $this->item = new ItemModel();
    }

    public function show()
    {
        $this->imageAdd();
        $product_id = $_GET['id'];
        $id = $_GET['id'];
        $item = $this->item->readId($id);
        $images = $this->model->read($product_id);
        debug($images);


        $data = [
            'item' => $item,
            'images' => $images,
        ];
        $this->view('images', $data);
    }

    public function imageAdd()
    {

    }
}