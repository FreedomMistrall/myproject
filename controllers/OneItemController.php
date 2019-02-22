<?php

class OneItemController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new ItemModel();
        $this->image = new ImagesModel();
    }

    public function show()
    {
        $user = Auth::userId();
        $id = (int)$_GET['id'];
        $item = new Item($this->model->readId($id));
        $images = $this->image->read($id);
        $data = [
            'item' => $item,
            'user' => $user,
            'images' =>$images,
        ];
        $this->view('oneItem', $data);
    }

}