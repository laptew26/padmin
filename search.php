<?php
require_once 'php/db.php';
include 'header.php';
$search = $_POST['search'];
?>
<main id="main">
    <div class="prod">
        <div class="prod__search">
            <div class="left-item">
                <form name="search" method="post" action="php/search.php">
                    <input name="search" placeholder="Поиск">
                    <button type="submit">Найти</button>
                </form>
            </div>
            <!--<div class="right-item">
                <form name="search" method="post" action="php/filtr.php">
                    <button type="submit">Фильтровать</button>
                    <input name="filter" placeholder="Введите название товара">
                    <input name="filter1" placeholder="Фильтр по цене">
                </form>
            </div>-->
        </div>
        <?php
        $stmt = $pdo->query("SELECT * FROM product WHERE `product`.`name` LIKE '%".$search."%'");
        while ($row = $stmt->fetch())
        {
            echo '<div class="prod__item">';
            echo '<h3>'.$row['name'].'</h3>';
            echo '<td><img src="'.$row['photo'].'" alt="Фоточка" width="190" height="190"></td>';
            echo '<div class="prod__item-buttons">';
            echo '<a target="_blank" href="product.php?id='.$row['id'].'" class="link text">Посмотреть</a>';
            echo '<a href="product.php?id='.$row['id'].'" class="link text">Добавить в корзину</a>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        }
        ?>
    </div>
</main>
<?php
include 'footer.php';
?>