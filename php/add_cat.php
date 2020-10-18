<?php
require('db.php');
$stmt= $pdo->query("INSERT INTO cat (name) VALUES ('Новая категория')");
$lastid = $pdo->lastInsertId();
header('Location: ../cat_ad.php?id='.$lastid.'');
?>