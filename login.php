<?php
    session_start();
    //устанавливаем соедние с базами данных
    require("con_bd.php");
    //получаем данные с клиента из fetch запроса
    $postData = file_get_contents('php://input');
    //декодируем в json формат
    $data = json_decode($postData, true);
    $login = $data['login'];
    $password = $data['password'];
    //формируем SQL-запрос к бд
    $sql = "SELECT id, login, password FROM users WHERE
    login = '".$login."' AND password = '".$password."'";
    $result = mysqli_query($mysqli, $sql);
    $dates = mysqli_fetch_assoc($result);
    $id = $dates['id'];
    if (isset($dates)) {
        $_SESSION['session'] = $id;
        header("Locatin: http://localhost/form_tasks.php");
        echo json_encode(['status'=>true]);
        exit( );
    } else {
        echo json_encode(['status'=>false]);
    }
?>