<?php
session_start();
require_once 'php/db.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['role'];
    if($admin != 2){
        header('Location: cab.php');
    }
} else {
    header('Location: index.php');
}
include 'header.php';
?>
<main id="main">
    <form class="auth" action="php/add_prod.php">
        <button>Добавить товар</button>
    </form>
    <?php
    $stmt = $pdo->query('SELECT *, `product`.id AS idR FROM `product` ORDER BY idR ASC');
    while ($row = $stmt->fetch())
    {
        echo '<div class="prod__item">';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<div><img src="img/prod/'.$row['photo'].'" alt="Фоточка" width="190" height="190"></div>';
        echo '<div class="prod__item-buttons">';
        echo '<a href="product_ad.php?id='.$row['id'].'" class="link text">Редактировать</a>';
        echo '<a href="php/delete_pr.php?id='.$row['id'].'" class="link text">Удалить</a>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</main>
<?php
include 'footer.php';
?>

