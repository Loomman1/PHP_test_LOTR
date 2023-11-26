<?php
    session_start();
    require_once 'connect.php';
    $login=$_POST['login'];
    $pass=md5($_POST['passwd']);
    $query="SELECT * FROM `logins` WHERE `login`='$login' AND `password`='$pass'";
    $check_user = mysqli_query($connect, $query);
    if(mysqli_num_rows($check_user)>0){
        $user=mysqli_fetch_assoc($check_user);//тут получается массив как в бд, можно использовать для вопросов
        $_SESSION['idshnik']=$user['id'];
        $_SESSION['username'] = $login;
        $_SESSION['password'] = $pass;
        if($login=="admin")
        header('Location: adminPanel.php');
        else
        header('Location: menu.php');
    }else{
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: index.php');
    }
    ?>