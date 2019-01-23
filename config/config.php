<?php

function config($type) {
    $all_config = [
        'db' => [
            'host' => 'localhost', 'user' => 'root', 'password' => '', 'db' => 'shop'
        ]
    ];
    $result = $all_config[$type];
    return $result;
}

