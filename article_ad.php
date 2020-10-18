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

$id = $_GET['id'];
$s = $pdo->query("SELECT * FROM `article` WHERE id='".$id."'")->fetch();

if(isset($_POST['commit']))
{
    $title=$_POST['title'];
    $text=$_POST['text'];
    $photo=$_POST['photo'];

    $sql ="UPDATE `article` SET title='".$title."', text='".$text."', photo='".$photo."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: articles_ad.php');
}
include 'header.php';
?>

<section class="container">
    <div class="login">
        <?php Echo'<h1>Обновить Товар('.$s["title"].')</h1> '; ?>
       <form method="post" class="auth" enctype="multipart/form-data">        <?php
            Echo'<div><input type="text" name="title" value="'.$s["title"].'" placeholder="Название"></div>';
            Echo'<div><textarea name="text" placeholder="Описание">'.$s["text"].'</textarea></div>';
            Echo'<div><input type="file" name="photo" value="'.$s["photo"].'" placeholder="Фоточка"></div>';
            Echo'<div><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></div>';
            Echo'<div><button type="submit" name="commit">Отедактировать</button>';
            ?>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>
