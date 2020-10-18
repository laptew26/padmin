<?php
session_start();
require_once 'php/db.php';

$sql = "SELECT * FROM `category`";
$result = $pdo->query($sql);

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
<main class="container">
    <div class="login">
        <h1>Таблица категорий</h1>
            <?php
            while ($row = $result->fetch())
            {
                echo '<div class="cat__item">';
                echo '<h3>'.$row['name'].'</h3>';
                echo '<span>ID категории: '.$row['id'].'</span>';
                echo '<div class="cat__item-buttons">';
                echo '<a href="cat_ad.php?id='.$row['id'].'"><i class="fas fa-edit"></i></a>';
                echo '<a href="php/delete_cat.php?id='.$row['id'].'"><i class="fas fa-trash-alt"></i></a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        <br>
        <form action="php/add_cat.php">
            <button type="submit">Добавить категорию</button>
        </form>
        <br>
        <form action="admin_panel.php">
            <button type="submit">Назад</button>
        </form>
    </div>
</main>
<?php
include 'footer.php';
?>