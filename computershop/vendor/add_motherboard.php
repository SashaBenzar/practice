<?php
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $mark = $_POST['mark'];
    $price = $_POST['price'];
    $form_factor = $_POST['form_factor'];
    $socket = $_POST['socket'];
    $type = $_POST['type'];
    $compatible_RAM = $_POST['compatible_RAM'];
    
    if(strlen($name) == 0 || strlen($mark) == 0 || strlen($price) == 0 || strlen($form_factor) == 0 || strlen($socket) == 0 || strlen($type) == 0 || strlen($compatible_RAM) == 0 || strlen($_FILES['photo']['name']) == 0)
    {
        $_SESSION['message'] = 'Вы не заполнили все данные';
        header('Location: ../add_tovar2.php');
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

        mysqli_query($connect, "INSERT INTO `basic`(`name`, `mark`, `price`, `photo`, `access_id`) VALUES ('$name','$mark','$price','$path','2')");

        $basic_id = mysqli_query($connect, "SELECT `id` FROM `basic`");
        $bi = mysqli_fetch_all($basic_id);
        $u = implode($bi[mysqli_num_rows($basic_id)-1]);
        mysqli_query($connect, "INSERT INTO `motherboard`(`type_id`, `form_factor`, `socket`, `type`, `compatible_RAM`) VALUES ('$u','$form_factor','$socket','$type','$compatible_RAM')");
        header('Location: ../index.php');
    }
        
?>
