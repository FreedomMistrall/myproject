<?php 
include 'controllers/admin.php';
include 'controllers/home.php';

index_admin();

include 'templates/header.php';




$str = 'Это помогает избежать добавления случайных символов пробела или перевода строки после закрывающего тега PHP.';
$limit = 50;

function small_string($str,$limit) {                         
    $array = explode(' ', $str);                  
    $string = '';                               
    foreach ($array as $word) {
        $string = $string . ' ' . $word;           
        if (strlen($string) >= $limit) {          
            $smallString = $string . ' ...';        
            break;                              
        }                                       
        else                                    
            $smallString = $string;               
        }                                       
    return $smallString;                         
}
$result = small_string($str,$limit);
print_r($result);


?>