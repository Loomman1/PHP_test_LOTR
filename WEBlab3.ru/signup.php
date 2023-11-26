<?php
    session_start();
    require_once 'connect.php';
    $login=$_POST['login'];
    $pass1=$_POST['passwd1'];
    $pass2=$_POST['passwd2'];

    $query111="SELECT * FROM `logins`";
    $data = mysqli_query($connect, $query111);
    while($row=mysqli_fetch_assoc($data)){
    $logarr[] = $row;
    }
    $fl=0;
    foreach($logarr as $row){
        if($row['login']==$login){
            $_SESSION['message'] = 'Пользователь с таким именем уже существует!';
            header('Location: registration.php');
            $fl=1;
        }
    }
    if($fl==0){
        if($pass1===$pass2){
            $pass1=md5($pass1);
            mysqli_query($connect, "INSERT INTO `logins` (`id`, `login`, `password`) VALUES (NULL, '$login', '$pass1')");
            header('Location: index.php');
        }else{
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: registration.php');
        }
    }
?>