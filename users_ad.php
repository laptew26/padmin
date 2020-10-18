<?php
session_start();
require_once 'php/db.php';

$sql = "SELECT * FROM `category`";
$result = $pdo->query($sql);

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
include 'header.php';
?>
<main id="main">
        <h1>Таблица пользователей</h1>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Роль</th>
            </tr>
            <?php
            $article = $pdo->query('SELECT * FROM `users` ORDER BY id DESC');
            while ($row = $article->fetch())
            {
                echo "<tr>";
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['login'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['phone'].'</td>';
                if($row['role'] == 2){
                    echo '<td><p>Администратор</p></td>';
                }else{
                    echo '<td><p>Пользователь</p></td>';
                }
                echo '<td><a href="php/update_role.php?id='.$row['id'].'"><i class="fas fa-sync-alt"></i></a></td>';
                echo "</tr>";

            }
            ?>
        </table>
</main>
<?php
include 'footer.php';
?>