<?php

class CartController extends Controller
{
    protected $model;
    protected $order;

    function __construct()
    {
        $this->model = new CartModel();
        $this->order = new OrderModel();
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
        if(!Auth::userId()){
            redirect('/login/login');
        }else {
            $user_id = Auth::userId();
            $id = !empty($_GET['id']) ? $_GET['id'] : null;
            $count = !empty($_GET['qty']) ? $_GET['qty'] : null;
            $prod = new ItemModel();
            $product = $prod->readId($id);
            $product = new Item($product);
            $price = $product->price;
            $data = [
                'user_id' => $user_id,
                'product_id' => $id,
                'count' => $count,
                'price' => $price
            ];
            $this->model->create($data);
        }

    }

    public function deleteCart()
    {
        $id = (int)$_GET['id'];
        $this->model->delete($id);
        redirect();
    }

    public function order()
    {
        if (isset($_POST['submit'])){
            $data = [$_POST['name'], $_POST['phone'], $_POST['address'], Auth::userId()];
            $orderId = $this->order->createOrder($data);
            $id = Auth::userId();
            $data = $this->model->readCart($id);
            $this->order->createOrderProduct($data,$orderId);

            $user = Auth::user();
            $name = $_POST['name'];
            $email = $user['email'];
            $cart = $this->model->readCart(Auth::userId());
            debug($cart);
            $data = [
                'email' => $email,
                'orderId' => $orderId,
                'cart'=> $cart,
                'name' => $name,
            ];
            sendMail($data);
            $success = 'Заказ принят!';
            $this->model->deleteCart($id);
            splashMessage($success,'alert-success');
            redirect('/cart/show');
        }
    $data = [];
    $this->view('order', $data);
    }
}