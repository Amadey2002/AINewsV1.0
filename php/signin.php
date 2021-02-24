<?php
    $name = htmlspecialchars($_POST['name']);   //getting a name;
    $email = htmlspecialchars($_POST['email']); //getting a email; 
    $pass = htmlspecialchars($_POST['password']);   //getting a password;
    
    include('login.phtml'); //importing a file
?>