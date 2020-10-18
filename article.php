<?php
include 'header.php';
require_once 'php/db.php';
$id = $_GET['id'];
?>
<main id="main">
    <?php
    $stmt = $pdo->query("SELECT * FROM `article` WHERE id =".$id);
    $stmt1 = $pdo->query("SELECT *  FROM `comments` LEFT JOIN users ON comments.user = users.id WHERE art =".$id);
    while ($row = $stmt->fetch())
    {
        echo '<div class="article">';
        echo '<h3>'.$row['title'].'</h3>';
        echo '<p class="justify">'.$row['text'].'</p>';
        echo '<div><img src="img/prod/'.$row['photo'].'" alt="Фоточка" width="150" height="150"></div>';
        echo '</div>';
        echo '<hr>';
        echo '<div class="article__comment">';
        echo '<h3>Комментарии:</h3>';
        while ($row2 = $stmt1->fetch()){
            echo '<h4>'.$row2['name'].'</h4>';
            echo '<p>'.$row2['text'].'</p>';
        }
        echo '</div>';
    }
    ?>
</main>
<?php
include 'footer.php';
?>