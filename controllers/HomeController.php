<?php 

class HomeController extends Controller
{
    public function index()
    {
        $model = new ItemModel();
        $limit = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $total = $model->count();
        $pag = new Pagination($page, $limit, $total);
        $start = $pag->getStart();
        $pagination = $pag->pagination();
        $items=$model->getDataItems($start, $limit);
        $user = Auth::user();
        $userAdmin = Auth::isAdmin();

        $data = [
        'items' => $items,
        'oneItem'=>$this->getId($items),
        'cookieOk' => $this->getCookie(),
        'last3ItemsId' => $this->last3ItemsId($items),
            'user' => $user,
            'userAdmin' => $userAdmin,
            'pagination' => $pagination,
        ];
        $this->view('home',$data);
    }

    public function getId($items)
    {
        if(isset($_GET['id']))
        {
            $items = array_filter($items,function($item)
            {
            return $_GET['id'] === $item->id;
            });
        }
        return $items;
    }

    public function last3ItemsId($items)
    {
        if(isset($_GET['id']))
        {
            if(!isset($_SESSION['itemsId']))
            {
                $_SESSION['itemsId'] = [];
            }
            array_unshift($_SESSION['itemsId'], $_GET['id']);
        }
        if (!empty($_SESSION['itemsId']))
        {
        $_SESSION['itemsId'] = array_unique($_SESSION['itemsId']);
        $_SESSION['itemsId'] = array_slice($_SESSION['itemsId'],0,3);
        }
        $itemId = [];
        if (isset($_SESSION['itemsId']))
        {
            foreach ($_SESSION['itemsId'] as $value)
            {
                foreach ($items as $item)
                {
                    if ($value == $item->id)
                    {
                        $itemId[] = $item;
                    }
                }
            }
        }return $itemId;
   }
   
    public function getCookie()
    {
        if (isset($_COOKIE['myCookie']))
        {
            return true;
        }
    }
}
