<?php
    session_start();

    if ($_SESSION['user']['role'] == 'USER') {
    header('Location: index.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Додати товар</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!-- Форма регистрации -->
    <form action="vendor/add_motherboard.php" method="POST" enctype="multipart/form-data">
        <label>Повна назва товару</label>
        <input type="text" name="name" placeholder="Наприклад: Asus PRIME B560-PLUS">
        <label>Оцінка товару</label>
        <input type="text" name="mark" placeholder="Наприклад: 4.6">
        <label>Ціна товару</label>
        <input type="text" name="price" placeholder="Наприклад: 200">
        <label>Фотографія товару</label>
        <input type="file" name="photo">
        <label>Форм-фактор</label>
        <input type="text" name="form_factor" placeholder="Наприклад: ATX">
        <label>Роз'єм процесора (Socket)</label>
        <input type="text" name="socket" placeholder="Наприклад: LGA1200">
        <label>Тип</label>
        <input type="text" name="type" placeholder="Наприклад: Материнські плати Intel">
        <label>Сумісні ОЗП</label>
        <input type="text" name="compatible_RAM" placeholder="Наприклад: DDR4 для ПК">
        <button type="submit">Добавити</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
        <a href="index.php" align='center'>Повернутись на головну сторінку</a>
    </form>
</body>
</html>