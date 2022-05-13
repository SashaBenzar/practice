<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $email_error = mysqli_query($connect, "SELECT * FROM `account` WHERE `email` = '$email'");
    $phone_error = mysqli_query($connect, "SELECT * FROM `account` WHERE `phone` = '$phone'");
    
    if(strlen($name) == 0 || strlen($surname) == 0 || strlen($phone) == 0 || strlen($email) == 0 || strlen($password) == 0 || strlen($password_confirm) == 0) {
        $_SESSION['message'] = 'Вы не заполнили все данные';
        header('Location: ../register.php');
    }
    else if (mysqli_num_rows($phone_error) > 0) {
        $_SESSION['message'] = 'Такой номер телефона уже есть';
        header('Location: ../register.php');
    }
    else if (mysqli_num_rows($email_error) > 0) {
        $_SESSION['message'] = 'Такой email уже есть';
        header('Location: ../register.php');
    }
    else if ($password != $password_confirm) {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
    else {
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `account` (`role`,`name`, `surname`, `phone`, `email`, `password`) VALUES ('USER','$name', '$surname', '$phone', '$email', '$password')");
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../enter.php');
    }

?>