<?php
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
    <?php
    $stmt = $pdo->query('SELECT *, `article`.id AS idR FROM `article` ORDER BY idR DESC');
    while ($row = $stmt->fetch())
    {
        echo '<div class="article">';
        echo '<h3>'.$row['title'].'</h3>';
        echo '<p class="justify">'.$row['text'].'</p>';
        echo '<a href="article.php?id='.$row['id'].'" class="link text">Читать далее...</a>';
        echo '</div>';
    }
    ?>
</main>
<?php
include 'footer.php';
?>