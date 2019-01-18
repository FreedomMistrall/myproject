<?php

class Controller {
    
    protected function view($template, $data){
        extract($data);

        include('templates/'.$template.'.php');

    }
    
}
