<?php
session_start();
require_once 'db.php';
if(isset($_SESSION['auth']))
{
    $s= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $s->fetch();
} else {
    header('Location: ../index.php');
}

$title=$_POST['title'];
$text=$_POST['text'];
$photo=$_FILES['photo']['name'];
$user=$_POST['user'];

$destiation_dir = '../img/prod/'.$photo;
move_uploaded_file($_FILES['photo']['tmp_name'], $destiation_dir);

$stmt= $pdo->query('INSERT INTO `article` (`user`, `title`, `text`, `photo`)
        VALUES ("'.$user.'","'.$title.'", "'.$text.'", "'.$photo.'")');

header('Location: ../index.php');