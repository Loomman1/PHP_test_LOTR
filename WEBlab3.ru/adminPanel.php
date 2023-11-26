<?php
    session_start();
    if(!$_SESSION['username']){
        header('Location: index.php');
    }else if($_SESSION['username']!='admin'){
        header('Location: menu.php');
    }
    ?>

<!doctype html>
<html lang="ru">
<head>
  <title>menu</title>
  <link rel="stylesheet" type="text/css" href="cs.css" <?echo time();?>>
</head>
<body>
    <div class="wrapper">
     <div class="center_form">
        <form action="addq.php" method="post" onsubmit="func(); return false;">
            <div class="formmain">
                <h2>Молви 
                <?php echo $_SESSION['username'];?>    
                и добавь</h2>
                <button class="btn" type="submit">Добавить вопрос</button>
                <a href="logout.php">Выход</a>
            </div>
            <a href="checkq.php">Просмотреть вопросы</a><br>
            <a href="checkans.php">Просмотреть результаты</a>
        </form>
    </div>
    </div>
</body>
</html>