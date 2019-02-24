<?php

class AdminController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new ItemModel();
    }

    public function show()
    {
        $items = $this->model->getDataItems(0, 100);
        $data = [
            'items' => $items,
        ];
        $this->view('admin', $data);
    }

    public function add()
    {
        if (!isset($_GET['id'])){
            if (!empty($_POST['name'])){
                if (isset($_POST['submit'])){
                    $data = [
                        'name' => $_POST['name'],
                        'description' => $_POST['desc'],
                        'price' => $_POST['price'],
                        'stock' => $_POST['stock'],
                        'disc' => $_POST['disc'],
                        'image' => $_POST['img'],
                    ];
                    $add = $this->model->create($data);
                    redirect('/admin/show');
                }
            }
            $data = [];
            $this->view('formAdmin', $data);
        }else{
            $id = $_GET['id'];
            $item = $this->model->readId($id);
            if (isset($_POST['submit'])){
                $data = [
                    'name' => $_POST['name'],
                    'description' => $_POST['desc'],
                    'price' => $_POST['price'],
                    'stock' => $_POST['stock'],
                    'disc' => $_POST['disc'],
                    'image' => $_POST['img'],
                ];
                $add = $this->model->update($id,$data);
                redirect('/admin/show');
            }
            $data = [
                'item' => $item
            ];
            $this->view('formAdmin', $data);
        }
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        $this->model->delete($id);
        redirect();
    }
}