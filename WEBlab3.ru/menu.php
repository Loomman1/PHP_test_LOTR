<?php
    session_start();
    if(!$_SESSION['username']){
        header('Location: index.php');
    }elseif($_SESSION['username']=="admin"){
        header('Location: adminPanel.php');
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
        <form action="test.php" method="post" onsubmit="func(); return false;">
            <div class="formmain">
                <h2>Молви 
                <?php
                        echo $_SESSION['username'];
                        ?>    
                и начни</h2>
                <button class="btn" type="submit">Начать тест</button>
                <a href="logout.php">Выход</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>