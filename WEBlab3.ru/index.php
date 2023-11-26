<?php
    session_start();
    if($_SESSION['username']=='admin'){
        header('Location: adminPanel.php');
    }else if($_SESSION['username']){
        header('Location: menu.php');
    }

?>

<!doctype html>
<html lang="ru">
<head>
  <title>auth</title>
  <link rel="stylesheet" type="text/css" href="cs.css" <?echo time();?>>
</head>
<body>
    <div class="wrapper">
     <div class="center_form">
        <form action="signin.php" method="post">
            <div class="formmain">
                <h2>Молви друг и войди</h2>
                <div>
                    <input class="inpt" type="text" size="25" id="login" name="login" placeholder="Введите логин"/>
                    <label class="enter" for="ans1">Логин</label>
                </div>
                <div>
                    <input class="inpt" type="password" size="25" id="password" name="passwd" placeholder="Введите пароль"/>
                    <label class="enter" for="ans2">Пароль</label>
                </div>
                <p class="msg">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </p>
                <button class="btn" type="submit">Войти</button>
                <a href="registration.php">Регистрация</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
