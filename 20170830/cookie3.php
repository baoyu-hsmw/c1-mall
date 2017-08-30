<?php
$data = [
    ['id' => 1, 'name' => 'VIVO X6', 'num' => 1, 'price' => 3000, 'cover' => 'aaa.jpg'],
    ['id' => 2, 'name' => 'iPhone SE', 'num' => 1, 'price' => 4000, 'cover' => 'bbb.jpg'],
];
setcookie('cart', json_encode($data), strtotime('+1 year'));