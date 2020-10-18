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
        <form class="auth" action="add_article.php">
            <button>Создать статью</button>
        </form>
        <?php
        $stmt = $pdo->query('SELECT *, `article`.id AS idR FROM `article` ORDER BY idR DESC');
        while ($row = $stmt->fetch())
        {
            echo '<div class="article">';
            echo '<h3>'.$row['title'].'</h3>';
            echo '<div class="admin">';
            echo '<a href="article_ad.php?id='.$row['id'].'">Редактировать</a>';
            echo '<a href="php/delete_art.php?id='.$row['id'].'">Удалить</a>';
            echo '</div>';
            echo '<p class="justify">'.$row['text'].'</p>';
            echo '<a href="article.php?id='.$row['id'].'" class="link text">Читать далее...</a>';
            echo '</div>';
        }
        ?>
    </main>
<?php
include 'footer.php';
?>