<?php
include_once'templates/header.php';

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
            if (!empty($_POST['name'])) {
                if (isset($_POST['submit'])) {
                    $add = $this->model->create();
                    redirect('/admin/show');
                }
            }
            $data = [];
            $this->view('formAdmin', $data);
        }else {
            $id = $_GET['id'];
            $item = $this->model->readId($id);
            if (isset($_POST['submit'])) {
                $add = $this->model->update($id);
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