<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>Ім'я</label>
        <input type="text" name="name" placeholder="Введіть своє ім'я">
        <label>Прізвище</label>
        <input type="text" name="surname" placeholder="Введіть своє прізвище">
        <label>Телефон</label>
        <input type="text" name="phone" placeholder="Введіть номер телефону">
        <label>Пошта</label>
        <input type="email" name="email" placeholder="Введіть адресу своєї пошти">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <label>Підтвердження пароля</label>
        <input type="password" name="password_confirm" placeholder="Підтвердіть пароль">
        <button type="submit">Зареєструвати</button>
        <p>
            У вас вже є обліковий запис? - <a href="enter.php">авторизуйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        <a href="index.php" align='center'>Повернутись на головну сторінку</a>
    </form>
</body>
</html>