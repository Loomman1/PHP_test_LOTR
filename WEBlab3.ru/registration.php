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
  <title>reg</title>
  <link rel="stylesheet" type="text/css" href="cs.css" <?echo time();?>>
</head>
<body>
    <div class="wrapper">
     <div class="center_form">
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <div class="formmain">
                <h3>Молви друг и зарегистрируйся</h3>
                <div>
                    <input class="inpt" type="text" size="25" id="login" name="login" placeholder="Введите логин"/>
                    <label class="enter" for="ans1">Логин</label>
                </div>
                <div>
                    <input class="inpt" type="password" size="25" id="password" name="passwd1" placeholder="Введите пароль"/>
                    <label class="enter" for="ans2">Пароль</label>
                </div>
                <div>
                    <input class="inpt" type="password" size="25" id="password" name="passwd2" placeholder="Подтвердите пароль"/>
                    <label class="enter" for="ans2">Пароль</label>
                    <p class="msg">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </p>
                </div>
                <button class="btn" type="submit">Зарегистрироваться</button>
                <a href="index.php">Вход</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
