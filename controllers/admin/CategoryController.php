<?php
include_once'templates/header.php';

class CategoryController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function show()
    {
        $result = $this->model->read();
        $data = [
            'result' => $result,
        ];
        $this->view('category', $data);
    }

    public function add()
    {
        if(!isset($_GET['id'])) {
            if (!empty($_POST['submit'])) {
                $category = $_POST['category'];
                $category = $this->model->create();
                redirect('/category/show');
            }
            $data = [];
            $this->view('formCategory', $data);
        } else{
            $id = $_GET['id'];
            $category = $this->model->readId($id);
            if (isset($_POST['submit'])) {
                $this->model->update($id);
                redirect('/category/show');
            }
            $data = [
                'category' => $category,
            ];
            $this->view('formCategory', $data);
        }
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        $this->model->delete($id);
        redirect();
    }
}