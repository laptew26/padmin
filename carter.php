<?php
require_once 'php/cart.php';
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">

    <?php

    $cart = new Cart();
    var_dump($cart->cart);

    ?>
    <a class="link" href="order.php">Blyad</a>
</main>
<?php
include 'footer.php';
?>