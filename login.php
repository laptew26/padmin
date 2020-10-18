<?php
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
<h2>Авторизация</h2>
    <form method="post" class="auth" action="php/log.php">
        <div>
            <input type="text" name="login" value="" placeholder="Логин или Email">
        </div>
        <div>
            <input type="password" name="password" value="" placeholder="Пароль">
        </div>
        <div>
            <button type="submit" name="commit">Вход</button>
        </div>
    </form>
    <p>Вы не зарегистрированы?<a href="register.php"> Жмяк! </a> </p>
</main>
<?php
include 'footer.php';
?>