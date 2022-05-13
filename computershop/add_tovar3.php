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
    <form action="vendor/add_processor.php" method="POST" enctype="multipart/form-data">
        <label>Повна назва товару</label>
        <input type="text" name="name" placeholder="Наприклад: Intel Core i5-10400F 2.9(4.3)GHz s1200 Box">
        <label>Оцінка товару</label>
        <input type="text" name="mark" placeholder="Наприклад: 4.8">
        <label>Ціна товару</label>
        <input type="text" name="price" placeholder="Наприклад: 300">
        <label>Фотографія товару</label>
        <input type="file" name="photo">
        <label>Лінійка</label>
        <input type="text" name="line" placeholder="Наприклад: Intel Core i5">
        <label>Роз'єм процесора (Socket)</label>
        <input type="text" name="socket" placeholder="Наприклад: LGA1200">
        <label>Кількість ядер</label>
        <input type="text" name="number_of_cores" placeholder="6 ядер">
        <label>Інтегрована графіка</label>
        <input type="text" name="integrated_graphics" placeholder="Наприклад: Інтегрована графіка">
        <label>Сумісність</label>
        <input type="text" name="compatibility" placeholder="Наприклад: Без встроенной графики">
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