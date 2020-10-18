<?php
session_start();
require_once 'db.php';

if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['role'];
    if($admin != 2){
        header('Location: ../cab.php');
    }
    else {
        header('Location: ../admin_panel.php');
    }

} else {
    header('Location: ../index.php');
}