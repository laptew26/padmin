<?php

require_once 'cart.php';
$cart = new Cart();
$cart->addproduct($_GET['id']);

var_dump($cart->cart);

echo '<a href="../products.php">Назад</a>';

?>