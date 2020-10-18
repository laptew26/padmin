<?php
require_once 'php/db.php';
include 'header.php';
$id = $_GET['id'];
?>
<main id="main">
    <?php
    $stmt = $pdo->query("SELECT * FROM `product` WHERE id =".$id);
    while ($row = $stmt->fetch())
    {
        echo '<div class="prod_item-full">';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<div><img src="img/prod/'.$row['photo'].'" alt="Фоточка" width="300" height="300"></div>';
        echo '<p class="justify">'.$row['text'].'</p>';
        echo '<a href="product.php?id='.$row['id'].'" class="link text">Добавить в корзину за '.$row['price'].' &#8381</a>';
        echo '</div>';
    }
    ?>
</main>
<?php
include 'footer.php';
?>