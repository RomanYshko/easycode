<?php
require_once 'Database.php';
$db = new Database();
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($login)) {
        echo 'Введите Login!';
    } elseif (empty($email)){
        echo 'Введите Email!';
    } elseif (empty($password)){
        echo 'Введите Password!';
    } else {
        if ($db->insertRow("INSERT INTO reg(login, email, password) VALUES(?, ?, ?)", [$login, $email, $password]) == TRUE){
            echo 'Вы успешно зарегистрировались';
        } else {
            echo 'Error!';
        }
    }
}
$result = $db->getRows("SELECT * FROM reg");
if (!empty($result)) {
    echo '<pre>';
    print_r($result);
    echo '</pre>';
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Form</title>
</head>

<body>

<form action="" method="post">
    <label>Your name</label>
    <p><input type="text" name="login"></p>
    <label>Email Address</label>
    </p><input type="text" name="email"></p>
    <label>Password</label><br>
    <p><input type="password" name="password"></p>
    <input type="submit" name="submit">
</form>

</body>
</html>