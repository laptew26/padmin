<?php
session_start();
require_once 'db.php';
//////////////////////////////////////////////////////////////
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
//////////////////////////////////////////////////////////////
$id = $_GET['id'];
$s = $pdo->query("SELECT role FROM `users` WHERE id='".$id."'");
$idR= $s->fetch();

if($idR["role"] ==2){

    $sql ="UPDATE `users` SET role=1 WHERE id='".$id."'";
    $stm = $pdo->query($sql);
}else{

    $sql ="UPDATE `users` SET role=2 WHERE id='".$id."'";
    $stm = $pdo->query($sql);
}

header('Location: ../users_ad.php');