<?php
session_start();
require_once 'php/db.php';

if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT *, `users`.id AS ID FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $result = $stmt->fetch();
    $admin = $result['role'];
    if($admin == 2){
        header('Location: admin_panel.php');
    }
} else {
    header('Location: login.php');
}
include 'header.php';
?>
<main id="main">
        <h1>Личный кабинет</h1>
        <?php
        echo '<p>Логин: '.$result['login'].'<p>';
        echo '<p>Имя: '.$result['name'].'<p>';
        echo '<p>Телефон: '.$result['phone'].'<p>';
        ?>
        <h2>Статьи пользователя:</h2>
            <?php
            $article = $pdo->query("SELECT * FROM `article` WHERE `article`.user =".$result['ID']);
            while ($row = $article->fetch())
            {
                echo '<div class="article">';
                echo '<h3>'.$row['title'].'</h3>';
                echo '<p class="justify">'.$row['text'].'</p>';
                echo '<a href="article.php?id='.$row['id'].'" class="link text">Читать далее...</a>';
                echo '</div>';
            }
            ?>
        <form class="auth" action="add_article.php">
            <button>Создать статью</button>
        </form>
    <br>
        <form method="post" class="auth" action="php/exit.php">
            <button type="submit" name="commit">Выход</button>
        </form>
</main>
<?php
include 'footer.php';
?>