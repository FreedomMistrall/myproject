<?php

class Pagination
{
    public $page;
    public $countPage;
    public $total;
    public $limit;

    function __construct($page, $limit, $total)
    {
        $this->limit = $limit;
        $this->total = $total;
        $this->countPage = $this->getCountPage();
        $this->page = $this->getPage($page);
    }

    function pagination()
    {
        $pagination = '';
        $url = $_SERVER['REQUEST_URI'];
        $start = null;
        $back = null;
        $left = null;
        $now = null;
        $right = null;
        $next = null;
        $end = null;

        $now = "<a href='/home/show?page=" . "$this->page'>$this->page</a>";
        if ($this->page > 1){
            $back = "<a href='/home/show?page=" . ($this->page-1) . "'>Back</a>";
        }
        if ($this->page < $this->countPage){
            $next = "<a href='/home/show?page=" . ($this->page+1) . "'>Next</a>";
        }
        if ($this->page > 3){
            $start = "<a href='/home/show'>First</a>";
        }
        if ($this->page < $this->countPage - 2){
            $end = "<a href='/home/show?page=" . "$this->countPage'>Last</a>";
        }
        if (($this->page - 1) > 0){
            $left = "<a href='/home/show?page=" . ($this->page-1) . "'>" . ($this->page-1) . "</a>";
        }
        if (($this->page + 1) < $this->countPage){
            $right = "<a href='/home/show?page=" . ($this->page+1) . "'>" . ($this->page+1) ."</a>";
        }
        return $start . ' ' . $back . ' ' . $left . ' ' . $now . ' ' . $right . ' ' . $next . ' ' . $end;
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