<?php
session_start();

require_once 'db.php';

$login=$_POST['login'];
$password=md5($_POST['password']);
$remember=$_POST["remember_me"];

$stmt= $pdo->query('SELECT `login`, `password` FROM `users` WHERE login="'.$login.'"');

$result = $stmt->fetch();

if ($password == $result['password']) {
    $_SESSION['auth'] = $result['login'];
    header('Location: check.php');
} else {
    echo ("Пользователь не найден");
}