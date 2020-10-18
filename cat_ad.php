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
$stmt1 = $pdo->query("SELECT * FROM `category` WHERE id='".$id."'")->fetch();
if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $sql ="UPDATE `category` SET name='".$name."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);
    header('Location: cats_ad.php');
}
include 'header.php';
?>
<main id="main">
        <?php Echo'<h1>Обновить категорию('.$stmt1["name"].')</h1> '; ?>
        <form method="post" class="auth" enctype="multipart/form-data">        <?php
            Echo'<p><input type="text" name="name" value="'.$stmt1["name"].'" placeholder="Название"></p>';
            Echo'<p><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></p>';
            Echo'<p class="submit"><input type="submit" name="commit" value="Редактировать"></p>';
            ?>
        </form>
</main>
<?php
include 'footer.php';
?>
