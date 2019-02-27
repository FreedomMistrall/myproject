<?php 

class HomeController extends Controller
{
    protected $model;

    function __construct()
    {
        $this->model = new ItemModel();

    }

    public function index()
    {
        $user = Auth::user();
        $userAdmin = Auth::isAdmin();
        $filter = [];
        if (isset($_GET['cat_id'])) {
            $filter['cat'] = (int)$_GET['cat_id'];
        }
        if (isset($_POST['sort'])) {
            $min = $this->model->listItems($filter, 'min')['min'];
            $max = $this->model->listItems($filter, 'max')['max'];
            $filter ['priceMin'] = !empty($_POST['priceMin']) ? (int)$_POST['priceMin'] : $min;
            $filter ['priceMax'] = !empty($_POST['priceMax']) ? (int)$_POST['priceMax'] : $max;
        }

        $this->model->listItems($filter,$fields = null,$order=null);
        if(isset($_GET['sort'])){
            if ($_GET['sort'] == 'price-asc') {
                $order['min'] = $_GET['sort'];

            }
            if ($_GET['sort'] == 'price-desc'){
                $order['max'] = $_GET['sort'];

            }
            if ($_GET['sort'] == 'new'){
                $order['new'] = $_GET['sort'];

            }
        }

        if (!empty($_GET['search'])) {
            $filter ['search'] = $_GET['search'];
        }

        $limit = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $total = $this->model->listItems($filter,'count')['count'];
        $pag = new Pagination($page, $limit, $total);
        $start = $pag->getStart();
        $pagination = $pag->pagination();

        $items = $this->model->listItems($filter,$fields = null,$order,$limit,$start);
        $data = [
            'items' => $items,
            'oneItem'=>$this->getId($items),
            'cookieOk' => $this->getCookie(),
            'last3ItemsId' => $this->last3ItemsId($this->model->listItems()),
            'user' => $user,
            'userAdmin' => $userAdmin,
            'pagination' => $pagination,
        ];
        $this->view('home',$data);
    }

    public function getId($items)
    {
        if(isset($_GET['id'])) {
            $items = array_filter($items,function($item)
            {
            return $_GET['id'] === $item->id;
            });
        }
        return $items;
    }

    public function last3ItemsId($items)
    {
        if (!empty($_SESSION['itemsId'])){
        $_SESSION['itemsId'] = array_unique($_SESSION['itemsId']);
        $_SESSION['itemsId'] = array_slice($_SESSION['itemsId'],0,3);
        }
        $itemId = [];
        if (isset($_SESSION['itemsId'])) {
            foreach ($_SESSION['itemsId'] as $value) {
                foreach ($items as $item){
                    if ($value == $item->id){
                        $itemId[] = $item;
                    }
                }
            }
        }
        return $itemId;
   }
   
    public function getCookie()
    {
        if (isset($_COOKIE['myCookie'])){
            return true;
        }
    }
}
