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
    <?php
    echo '<h3>Привет '.$proverka['name'].'!<h3>';
    ?>
    <div class="admin">
        <a href="products_ad.php">Продукты</a>
        <a href="cats_ad.php">Категории</a>
        <a href="articles_ad.php">Статьи</a>
        <a href="users_ad.php">Пользователи </a>
    </div>
    <form method="post" class="auth" action="php/exit.php">
        <button type="submit" name="commit">Выход</button>
    </form>
</main>
<?php
include 'footer.php';
?>