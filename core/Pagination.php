<?php

class Pagination
{
    public $page;
    public $countPage;
    public $total;
    public $url;
    public $limit;

    function __construct($page, $limit, $total)
    {
        $this->limit = $limit;
        $this->total = $total;
        $this->countPage = $this->getCountPage();
        $this->page = $this->getPage($page);
        $this->url = $this->getUrl();
    }

    function pagination()
    {
        $pagination = '';
        $start = null;
        $back = null;
        $left = null;
        $now = null;
        $right = null;
        $next = null;
        $end = null;

        $now = "<a> $this->page </a>";
        if ($this->page > 1){
            $back = "<a href='{$this->url}page=" . ($this->page-1) . "'>Back</a>";
        }
        if ($this->page < $this->countPage){
            $next = "<a href='{$this->url}page=" . ($this->page+1) . "'>Next</a>";
        }
        if ($this->page > 3){
            $start = "<a href='{$this->url}'>First</a>";
        }
        if ($this->page < $this->countPage - 2){
            $end = "<a href='{$this->url}page=" . "$this->countPage'>Last</a>";
        }
        if (($this->page - 1) > 0){
            $left = "<a href='{$this->url}page=" . ($this->page-1) . "'>" . ($this->page-1) . "</a>";
        }
        if (($this->page + 1) < $this->countPage){
            $right = "<a href='{$this->url}page=" . ($this->page+1) . "'>" . ($this->page+1) ."</a>";
        }
        return $start . ' ' . $back . ' ' . $left . ' ' . $now . ' ' . $right . ' ' . $next . ' ' . $end;
    }

    function getUrl()
    {
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $uri = $url[0]. '?';

        if (isset($url[1]) && $url[1] != ''){

            $params = explode('&',$url[1]);
            foreach ($params as $param){
                if(!preg_match("#page=#", $param)){
                    $uri .= "{$param}&";
                }
            }
        }
        return $uri;
    }

    function getStart()
    {
        return ($this->page-1)*$this->limit;
    }
    function  getPage($page)
    {
        if((!$page)|| ($page < 1)) $page = 1;
        if ($page > $this->countPage) $page = $this->countPage;
        return $page;
    }
    function getCountPage()
    {
        return ceil($this->total/$this->limit);
    }

}