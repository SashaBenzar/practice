<?php

    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `account` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "role" => $user['role'],
            "surname" => $user['surname'],
            "phone" => $user['phone'],
            "email" => $user['email'],
            "password" => $user['password']
        ];

        header('Location: /');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../enter.php');
    }
    ?>
