<?php 
function get_data_items(){
$items = [
    ['id' => '1', 'name' => 'Монитор',      'price' => '1200.00', 'stock' => '5', 'disc' => '10'],
    ['id' => '2', 'name' => 'Компьютер',    'price' => '4200.00', 'stock' => '7', 'disc' => '10'],
    ['id' => '3', 'name' => 'Ноутбук',      'price' => '7700.00', 'stock' => '2', 'disc' => '10'],
    ['id' => '4', 'name' => 'Принтер',      'price' => '1800.00', 'stock' => '1', 'disc' => '10'],
    ['id' => '5', 'name' => 'Стол',         'price' => '1100.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '6', 'name' => 'Стул',         'price' => '2200.00', 'stock' => '0', 'disc' => '20'],
    ['id' => '7', 'name' => 'Шкаф',         'price' => '1260.00', 'stock' => '8', 'disc' => '20'],
    ['id' => '8', 'name' => 'Кресло',       'price' => '4250.00', 'stock' => '9', 'disc' => '20'],
    ['id' => '9', 'name' => 'Диван',        'price' => '9800.00', 'stock' => '1', 'disc' => '30'],
];
	return $items;
}
function get_data_images(){
$images = [
    ['id' => '1', 'img' => 'https://c.radikal.ru/c27/1812/51/0ab71bffd797.jpg'],
    ['id' => '2', 'img' => 'https://d.radikal.ru/d32/1812/0d/15d4dc782522.jpg'],
    ['id' => '3', 'img' => 'https://d.radikal.ru/d27/1812/fe/9fa572f8bb0a.jpg'],
    ['id' => '4', 'img' => 'https://c.radikal.ru/c15/1812/90/8a245b8b44d9.jpg'],
    ['id' => '7', 'img' => 'https://a.radikal.ru/a17/1812/72/c011bfc47d71.jpg'],
    ['id' => '8', 'img' => 'https://c.radikal.ru/c12/1812/70/634877a85140.jpg']
];
	return $images;
}
?>