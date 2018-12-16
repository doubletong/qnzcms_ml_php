<?php
//http://php-estudios.blogspot.com
//http://jquery-manual.blogspot.com
// Autor: manudg_1@msn.com
class PDO_Pagination
{
    public $connection;
    public $total;
    public $page;
    public $total_page;
    public $start_row;
    public $item;
    public $max_pages;
    public $max_rows;
    public $step;
    public $max;
    public $param;
    public $btn_first_page;
    public $btn_last_page;
    public $btn_next_page;
    public $btn_back_page;
    public $btn_page;
    public $btn_active;
    public function __construct($connection) {
        $this->btn_first_page = '首页';
        $this->btn_last_page = '尾页';
        $this->btn_next_page = '后页';
        $this->btn_back_page = '前页';
        $this->btn_page = '页 ';
        $this->btn_active = 'active';
        return $this->connection = $connection;
    }
    public function rowCount($query)
    {
        $query = $this->connection->prepare($query);
        $query->execute();
        $this->total = $query->rowCount();
    }
    public function config($max_pages, $max_rows)
    {

        $this->start_row = 0;
        $this->item = 0;
        $this->max_pages = $max_pages;
        $this->max_rows = $max_rows;
        $this->total_page = $this->total / $this->max_rows;
        if (isset($_GET["page"]))
        {
            $this->page = $_GET["page"];
            if ($this->page < 0 || !preg_match("/^([0-9])+$/", $this->page))
            {
                return;
            }
            $this->start_row = $this->page * $this->max_rows;
            $this->item = $_GET["item"];
            if ($this->item < 0  || !preg_match("/^([0-9])+$/", $this->item))
            {
                return;
            }
            $this->max_pages = $this->max_pages + $this->max_rows;
            $this->max = $_GET["max"];
            if ($this->max < 0  || !preg_match("/^([0-9])+$/", $this->max))
            {
                return;
            }
            $this->max_pages = $this->max;
        }
        if(isset($_GET["next_page"]))
        {
            $this->page = $_GET["next_page"];
            if ($this->page < 0  || !preg_match("/^([0-9])+$/", $this->page))
            {
                return;
            }
            $this->start_row = $this->page * $this->max_rows;
            $this->item = $_GET["item"];
            if ($this->item < 0  || !preg_match("/^([0-9])+$/", $this->item))
            {
                return;
            }
            $this->max = $_GET["max"];
            if ($this->max < 0  || !preg_match("/^([0-9])+$/", $this->max))
            {
                return;
            }
            $this->max_pages = $this->max + 1;
        }
        if(isset($_GET["back_page"]))
        {
            $this->page = $_GET["back_page"] - 1;
            if ($this->page < 0  || !preg_match("/^([0-9])+$/", $this->page))
            {
                return;
            }
            $this->start_row = $this->page * $this->max_rows;
            $this->item = $_GET["item"] - 1;
            if ($this->item < 0  || !preg_match("/^([0-9])+$/", $this->item))
            {
                return;
            }
            $this->max = $_GET["max"];
            if ($this->max < 0  || !preg_match("/^([0-9])+$/", $this->max))
            {
                return;
            }
            $this->max_pages = $this->max - 1;
        }
        if (isset($_GET["previous"]))
        {
            $this->max_pages = $this->max_pages;
            $this->start_row=0;
            $this->item = 0;
        }
    }
    public function pages()
    {

        if($this->item >= 1)
        {
            echo "<li class='page-item'><a class='page-link' href='?previous=1".$this->param."'>$this->btn_first_page</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?back_page=$this->page&item=$this->item&max=$this->max_pages".$this->param."'>$this->btn_back_page</a></li>";
        }
        for($x = $this->item; $x < $this->max_pages; $x++)
        {
            while($x * $this->max_rows < $this->total)
            {
                $p = $x+1;
                $this->page == $p-1 ? $active = ' ' . $this->btn_active : $active = null;
                echo "<li class='page-item $active'><a class='page-link' href='?page=$x&item=$this->item&max=$this->max_pages".$this->param."'>$p</a></li>";
                break;
            }
        }
        $numbers = $this->page+1;
        echo "<li class='page-item disabled'><a class='page-link' href='#'>$this->btn_page <b>$numbers</b></a></li>";
        if ($this->max_pages * $this->max_rows < $this->total)
        {
            $this->page = $this->page+1;
            $this->item = $this->item + 1;
            echo "<li class='page-item'><a class='page-link' href='?next_page=$this->page&item=$this->item&max=$this->max_pages".$this->param."'>$this->btn_next_page</a></li>";
            $this->page = round($this->total_page - 1);
            $this->item = round($this->total_page - $this->max_pages);
            $this->max = round($this->total_page);
            echo "<li class='page-item'><a class='page-link' href='?page=$this->page&item=$this->item&max=$this->max".$this->param."'>$this->btn_last_page</a></li>";
        }
    }
}