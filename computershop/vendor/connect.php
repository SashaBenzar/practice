<?php

    $connect = mysqli_connect('localhost', 'root', '', 'computershop');

    if (!$connect) {
        die('Error connect to DataBase');
    }