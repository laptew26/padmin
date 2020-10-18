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
$stmt = $pdo->query("SELECT * FROM `product` WHERE id='".$id."'")->fetch();
if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $text=$_POST['text'];
    $photo=$_FILES['photo']['name'];
    $price=$_POST['price'];

    $destiation_dir = 'img/prod/'.$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'], $destiation_dir);

    $sql ="UPDATE `product` SET name='".$name."', text='".$text."', price='".$price."', photo='".$photo."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: product_ad.php');
}
include 'header.php';
?>

<main id="main">
    <?php Echo'<h2>Обновить Товар('.$stmt["name"].')</h2> '; ?>
    <form method="post" class="auth" enctype="multipart/form-data">        <?php
        Echo'<div><input type="text" name="name" value="'.$stmt["name"].'" placeholder="Название"></div>';
        Echo'<div><textarea name="text" placeholder="Описание">'.$stmt["text"].'</textarea></div>';
        Echo'<div><input type="text" style="width:100px;" name="price" value="'.$stmt["price"].'" placeholder="Цена"><span style="padding-left: 10px;">&#8381</span></div>';
        Echo '<div><img src="img/prod/'.$stmt['photo'].'" alt="Фоточка" width="300" height="300"></div>';
        Echo'<div class="file-upload"><input type="file" value="'.$stmt["photo"].'" name="photo"><span>Добавить фото</span></div>';
        Echo'<div><input type="hidden" name="id" value="'.$id.'" placeholder="id"></div>';
        Echo'<div><button type="submit" name="commit">Закончить редактирование</button></div>';
        ?>
    </form>
</main>

<?php
include 'footer.php';
?>
