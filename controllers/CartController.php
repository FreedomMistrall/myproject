<?php

class CartController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new CartModel();
    }

    public function show()
    {
        $cart = $this->model->readCart(Auth::userId());
        $data = [
            'result'=> $cart,
        ];
        $this->view('cart', $data);
    }

    public function addCart()
    {
        if (isset($_POST['buy'])) {
            if ($_POST['count'] > 0){
                $this->model->create();
            }
            redirect();
        }
    }

    public function deleteCart()
    {
        $id = (int)$_GET['id'];
        $this->model->delete($id);
        redirect();
    }

}