<?php
require_once 'php/cart.php';
$cart = new Cart();
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
    <?php

    var_dump($cart->cart);

    ?>
</main>
<?php
include 'footer.php';
?>