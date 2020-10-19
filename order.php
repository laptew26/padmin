<?php
require_once 'php/cart.php';
require_once 'php/db.php';
include 'header.php';
?>
<main id="main">
    <div class="order">
        <div class="order__set left-item">
            <form class="auth" action="setOrder.php">

                <div>
                    <p>Введите Имя:</p>
                    <input name="name" type="text" value="">
                </div>
                <div>
                    <p>Введите Фамилию:</p>
                    <input name="surname" type="text" value="">
                </div>
                <div>
                    <p>Введите Отчество:</p>
                    <input name="midname" type="text" value="">
                </div>
                <div>
                    <p>Введите Логин:</p>
                    <input name="login" type="text" value="">
                </div>
                <div>
                    <p>Введите адрес доставки:</p>
                    <input name="adress" type="text" value="">
                </div>
                <div>
                    <button type="submit">Оформить заказ</button>
                </div>

            </form>
        </div>
        <div class="order__cart right-item">
            <p>sfdgfdg</p>
        </div>
    </div>
</main>
<?php
include 'footer.php';
?>