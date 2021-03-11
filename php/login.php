<?php
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
   
    $db = mysqli_connect('localhost', 'root','', 'users') or die("Ошибка " . mysqli_error($link));
  
    $queryEmail ="SELECT emailUser FROM usersdata";
    $queryPass = "SELECT passwordUser FROM usersdata";

    $resultEmail = mysqli_query($db, $queryEmail) or die("Ошибка " . mysqli_error($db)); 
    $resultPass = mysqli_query($db, $queryPass) or die("Ошибка " . mysqli_error($db));
    $rows = mysqli_num_rows($resultEmail);
    
    while ($row = mysqli_fetch_row($resultEmail)) {
      if($row[0] == $email){
       $resEmail = true;
       break;
      }else{
        $resPass = false;
      }
    }


    while ($row = mysqli_fetch_row($resultPass)) {
      if(password_verify($password, $row[0])){
       $resPass = true;
       break;
      }else{
        $resPass = false;
      }
    }

    if($resEmail && $resPass){
      $_SESSION['logged_user'] = $resEmail;
      echo '<div style="color:dreen;">Вы авторизованы!<br> 
      Можете перейти на <a href="../index.html">главную</a> страницу.</div><hr>';
    }else{
      echo '<a href="login.php">Попроюбуйте еще раз</a>';
    }
  
    
?>