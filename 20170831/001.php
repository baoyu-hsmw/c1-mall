<?php
$cart = [
    1 => ['id' => 1, 'name' => 'aaaaaa', 'num' => 1, 'cover' => 'aaa.jpg', 'price' => 100],
    2 => ['id' => 2, 'name' => 'bbbbbb', 'num' => 1, 'cover' => 'bbb.jpg', 'price' => 200],
]; //这个是从COOKIE读出来的购物车列表


$id = 2;

$cart_item = ['id' => $id, 'name' => 'aaaaaa', 'num' => 1, 'cover' => 'aaa.jpg', 'price' => 100]; //这个是要加到购物车的

if(isset($cart[$id])){ //说明里面有这个ID了
    $cart[$id]['num'] = $cart[$id]['num'] + 1;
} else {
    $cart[$id] = $cart_item;
}

echo '<pre>';
var_dump($cart);