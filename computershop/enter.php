<?php
session_start();
if ($_SESSION['user']) {
    header('Location: index.php');
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="email" placeholder="Введіть адресу своєї пошти">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <button type="submit">Увійти</button>
        <p> 
            У вас немає облікового запису? - <a href="/register.php">зареєструйтесь</a>!
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