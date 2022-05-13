<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $mark = $_POST['mark'];
    $price = $_POST['price'];
    $line = $_POST['line'];
    $socket = $_POST['socket'];
    $number_of_cores = $_POST['number_of_cores'];
    $integrated_graphics = $_POST['integrated_graphics'];
    $compatibility = $_POST['compatibility'];
    
    if(strlen($name) == 0 || strlen($mark) == 0 || strlen($price) == 0 || strlen($line) == 0 || strlen($socket) == 0 || strlen($number_of_cores) == 0 || strlen($integrated_graphics) == 0 || strlen($compatibility) == 0 || strlen($_FILES['photo']['name']) == 0)
    {
        $_SESSION['message'] = 'Вы не заполнили все данные';
        header('Location: ../add_tovar3.php');
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

        mysqli_query($connect, "INSERT INTO `basic`(`name`, `mark`, `price`, `photo`, `access_id`) VALUES ('$name','$mark','$price','$path','3')");

        $basic_id = mysqli_query($connect, "SELECT `id` FROM `basic`");
        $bi = mysqli_fetch_all($basic_id);
        $u = implode($bi[mysqli_num_rows($basic_id)-1]);
        mysqli_query($connect, "INSERT INTO `processor`(`type_id`, `line`, `socket`, `number_of_cores`, `integrated_graphics`, `compatibility`) VALUES ('$u','$line','$socket','$number_of_cores','$integrated_graphics','$compatibility')");
        header('Location: ../index.php');
    }