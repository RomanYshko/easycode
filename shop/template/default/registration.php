<?php 
require_once '../../config/db.php';
require_once 'header.php';
?>
    <div class="container-log mregister">
        <div id="login">
            <h1>Registration</h1>
            <form action="registration.php" id="registerform" method="post"name="registerform">
                <p><label for="user_login">Login<br>
                        <input class="input" id="full_name" name="login"size="32"  type="text" value=""></label></p>
                <p><label for="user_pass">E-mail<br>
                        <input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
                <p><label for="user_pass">Password<br>
                        <input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
                <button class="button" type="submit" name="registration">Registration</button>
                <p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
            </form>
        </div>
    </div>

<?php
require_once "../../library/RegistrationCheck.php";
?>