<?php
session_start();
require_once 'db.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['admin'];
    if($admin != 2){
        header('Location: ../user.php');
    }
} else {
    header('Location: ../padmin');

}
$id = $_GET['id'];
$stmt = $pdo->query("DELETE FROM `product` WHERE id = ".$id);
header('Location: ../products_ad.php');