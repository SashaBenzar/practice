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
    <form action="vendor/add_graphic_card.php" method="POST" enctype="multipart/form-data">
        <label>Повна назва товару</label>
        <input type="text" name="name" placeholder="Наприклад: Gigabyte GeForce GTX 1650 D6 OC 4096MB">
        <label>Оцінка товару</label>
        <input type="text" name="mark" placeholder="Наприклад: 4.9">
        <label>Ціна товару</label>
        <input type="text" name="price" placeholder="Наприклад: 500">
        <label>Фотографія товару</label>
        <input type="file" name="photo">
        <label>Чіп товару</label>
        <input type="text" name="chip" placeholder="Наприклад: GeForce GTX 1650">
        <label>Обсяг пам'яті</label>
        <input type="text" name="amount_of_memory" placeholder="Наприклад: 4096 Мб">
        <label>Тип пам'яті</label>
        <input type="text" name="memory_type" placeholder="Наприклад: GDDR6">
        <label>Шина пам'яті</label>
        <input type="text" name="memory_bus" placeholder="Наприклад: 128 бит">
        <label>Частота графічного ядра</label>
        <input type="text" name="graphics_core_frequency" placeholder="Наприклад: 1635 МГц">
        <label>Частота відеопам'яті</label>
        <input type="text" name="video_memory_frequency" placeholder="Наприклад: 1635 МГц">
        <label>Продуктивність</label>
        <input type="text" name="productivity" placeholder="Наприклад: 7726">
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