<?php
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
    <h2>Регистрация</h2>
    <form method="post" class="auth" action="php/reg.php">
        <div>
            <input type="text" name="login" value="" placeholder="Логин или Email">
        </div>
        <div>
            <input type="text" name="name" value="" placeholder="Имя">
        </div>
        <div>
            <input type="text" name="phone" value="" placeholder="Телефон">
        </div>
        <div>
            <input type="password" name="password" value="" placeholder="Пароль">
        </div>
        <div>
            <button type="submit"  name="commit">Регистрация</button>
        </div>
    </form>
    <p>Вы зарегистрированы?<a href="login.php"> Жмяк! </a> </p>
</main>
<?php
include 'footer.php';
?>