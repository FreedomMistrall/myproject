<?php
function get_noImage(){
	$noImage = 'https://d.radikal.ru/d41/1812/16/2c886ced25f5.png';
	return $noImage;
}

function config($type) {
    $all_config = [
        'db' => [
            'host' => 'localhost', 'user' => 'root', 'password' => '', 'db' => 'shop'
        ]
    ];
    $result = $all_config[$type];
    return $result;
}

