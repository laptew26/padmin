<?php
require_once 'db.php';
session_start();
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['role'];
    if($admin != 2){
        header('Location: ../cab.php');
    }
} else {
    header('Location: ../index.php');

}

$id = $_GET['id'];
$stmt = $pdo->query("DELETE FROM `article` WHERE id = ".$id);

header('Location: ../articles_ad.php');