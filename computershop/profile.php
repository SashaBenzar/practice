<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Профиль -->
    <div class="mainDiv">
        <h1 align="center">Профіль</h1>
        <br>
        <p><b>Ім'я:</b></p>
        <p><?= $_SESSION['user']['name'] ?></p>
        <p><b>Прізвище:</b></p>
        <p><?= $_SESSION['user']['surname'] ?></p>
        <p><b>Телефон:</b></p>
        <p><?= $_SESSION['user']['phone'] ?></p>
        <p><b>Email:</b></p>
        <p><?= $_SESSION['user']['email'] ?></p>
    </div>
</body>
</html>