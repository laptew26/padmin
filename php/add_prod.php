<?php
require('db.php');
$stmt= $pdo->query("INSERT INTO product (name, text, cat, photo, price)
                                                    VALUES ('Новый продукт', 'Не указано', '1', 'null', 'Не указано')");
$lastid = $pdo->lastInsertId();
header('Location: ../product_ad.php?id='.$lastid.'');
?>