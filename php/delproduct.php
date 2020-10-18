<?php

require_once 'cart.php';
$cart = new Cart();
$cart->delproduct($_GET['id']);

?>