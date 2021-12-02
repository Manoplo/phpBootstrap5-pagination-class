<?php

class Pagination{

    
    private $limit;
    private $total;
    private $offset;

    public function __construct($limit, $total){
        $this->limit = $limit;
        $this->total = $total;
    }

    public function paginate(){

        $html = "<nav aria-label='Page navigation example'>". "<ul class='pagination'>";
        $totalButtons = ceil($this->total / $this->limit);
        $currentButton = ceil($this->offset / $this->limit) + 1;
        $prev = $currentButton - 1;
        $next = $currentButton + 1;

        if($currentButton > 1){
            $html .= "<li class='page-item'><a class='page-link' href=".URLROOT."/incidencias/paginate/$this->limit>"."Primera</a></li>";
        }

        for($i = 1; $i <= $totalButtons; $i++){
            $offset = ($i - 1) * $this->limit;
            $html .= "<li class='page-item'><a class='page-link' href=".URLROOT."/incidencias/paginate/$offset>"."$i</a></li>";
        }

        $hmtl .= "</ul>"."</nav>";
        /* if($currentButton < $totalButtons){
            $offset = ($totalButtons - 1) * $this->limit;
            $html .= "<a href='?offset=$offset&limit=$this->limit'>Last</a>";
        } */

        return $html;

    }

}