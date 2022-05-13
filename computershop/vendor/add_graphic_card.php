<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $mark = $_POST['mark'];
    $price = $_POST['price'];
    $chip = $_POST['chip'];
    $amount_of_memory = $_POST['amount_of_memory'];
    $memory_type = $_POST['memory_type'];
    $memory_bus = $_POST['memory_bus'];
    $graphics_core_frequency = $_POST['graphics_core_frequency'];
    $video_memory_frequency = $_POST['video_memory_frequency'];
    $productivity = $_POST['productivity'];
    
    if(strlen($name) == 0 || strlen($mark) == 0 || strlen($price) == 0 || strlen($chip) == 0 || strlen($amount_of_memory) == 0 || strlen($memory_type) == 0 || strlen($memory_bus) == 0 || strlen($graphics_core_frequency) == 0 || strlen($video_memory_frequency) == 0 || strlen($productivity) == 0 || strlen($_FILES['photo']['name']) == 0)
    {
        $_SESSION['message'] = 'Вы не заполнили все данные';
        header('Location: ../add_tovar1.php');
    }
    else if(strlen($name) > 50)
    {
        $_SESSION['message'] = 'Занадто довга назва';
        header('Location: ../add_tovar1.php');
    }
    else
    {
        $path = 'uploads/' . time() . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path);

        mysqli_query($connect, "INSERT INTO `basic`(`name`, `mark`, `price`, `photo`, `access_id`) VALUES ('$name','$mark','$price','$path','1')");

        $basic_id = mysqli_query($connect, "SELECT `id` FROM `basic`");
        $bi = mysqli_fetch_all($basic_id);
        $u = implode($bi[mysqli_num_rows($basic_id)-1]);
        mysqli_query($connect, "INSERT INTO `graphics_card`(`type_id`, `chip`, `amount_of_memory`, `memory_type`, `memory_bus`, `graphics_core_frequency`, `video_memory_frequency`, `productivity`) VALUES ('$u','$chip','$amount_of_memory','$memory_type','$memory_bus','$graphics_core_frequency','$video_memory_frequency','$productivity')");
        header('Location: ../index.php');
    }
        
?>
