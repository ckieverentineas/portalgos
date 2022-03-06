<?php
    $localhost = "localhost"; //название сервера с БД
    $user = "root"; //Пользователь в БД
    $password = ""; //Пароль пользователя БД
    $database = "portal"; //Название баз данных в БД
    $mysqli = mysqli_connect($localhost, $user, $password, $database);
    /* в переменной $mysqli хранятся данные для соединения
    с базами данных*/
    //echo var_dump($mysqli);
?>