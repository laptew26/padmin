<?php
session_start();
require_once 'php/db.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $idR = $proverka['id'];
} else {
    header('Location: index.php');
}
include 'header.php';
?>
<main id="main">
    <form method="post" class="auth" enctype="multipart/form-data" action="php/add_art.php">
        <?php echo '<input type="hidden" name="user" value="'.$idR.'" placeholder="'.$idR.'">'; ?>
        <div>
            <input type="text" name="title" value="" placeholder="Заголовок статьи">
        </div>
        <div>
            <textarea type="" name="text" value="" placeholder="Содержание статьи"></textarea>
        </div>
        <div class="file-upload">
            <input type="file" name="photo">
            <span>Добавить фото</span>
        </div>
        <div>
            <button type="submit" name="commit">Подтвердить написание статьи</button>
        </div>
    </form>
</main>
<?php
include 'footer.php';
?>