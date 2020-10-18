<?php
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
    <div class="prod">
        <div class="prod__search">
            <div class="left-item">
                <form name="search" method="post" action="search.php">
                    <input name="search" placeholder="Поиск">
                    <button type="submit">Найти</button>
                </form>
            </div>
        </div>
        <?php
        $stmt = $pdo->query('SELECT *, `product`.id AS idR FROM `product` ORDER BY idR ASC');
        while ($row = $stmt->fetch())
        {
            echo '<div class="prod__item">';
            echo '<h3>'.$row['name'].'</h3>';
            echo '<td><img src="img/prod/'.$row['photo'].'" alt="Фоточка" width="190" height="190"></td>';
            echo '<div class="prod__item-buttons">';
            echo '<a href="product.php?id='.$row['id'].'" class="link text">Посмотреть</a>';
            echo '<a href="php/add_cart.php?id='.$row['id'].'" class="link text">Добавить в корзину за '.$row['price'].' &#8381</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</main>
<?php
include 'footer.php';
?>