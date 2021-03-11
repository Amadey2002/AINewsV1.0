<?php
    $db = mysqli_connect('localhost', 'root','', 'users') or die("Ошибка " . mysqli_error($link)); // подключение к БД datateacher

    $id = mysqli_insert_id($db);

    $name = mysqli_real_escape_string($db, $_POST['name']); // получаем данные из формы 
    $email = mysqli_real_escape_string($db, $_POST['email']); //получаем данные из формы 
    $password = mysqli_real_escape_string($db, $_POST['password']); //получаем данные из формы 
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO usersdata  VALUES('$id','$name', '$email', '$password')";
    mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db));

    include('login.phtml'); //importing a file
?>