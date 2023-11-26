<?php
    session_start();
    if(!$_SESSION['username'])
    {
        header('Location: index.php');
    }else
    if($_SESSION['username']!="admin"){
        header('Location: menu.php');
    }
    ?>


<!doctype html>
<html lang="ru">
<head>
  <title>menu</title>
  <link rel="stylesheet" type="text/css" href="cs.css" <?echo time();?>>
  <script type="text/javascript">
        function validateForm() {
            var a = document.forms["Form"]["q"].value;
            var b = document.forms["Form"]["anss1"].value;
            var c = document.forms["Form"]["anss2"].value;
            var d = document.forms["Form"]["anss3"].value;
            if ((a == null || a == "") || (b == null || b == "") || (c == null || c == "") || (d == null || d == "")) {
            alert("Заполните все поля!");
            return false;
            }
        }
        </script>
</head>
<body>
<div class="wrapper">
     <div class="answers_form">
     <form  action="addqcommit.php" name="Form" method="post" onsubmit="return validateForm()">
            <div class="formmain">
                <h2>Молви вопрос и введи ответ</h2>
                <div>
                    <input class="inpt" type="text" size="25" id="q" name="q" placeholder="Вопрос"/>
                    <label class="enter" for="q">Правильный</label>
                </div>
                <div>
                    <input class="inpt" type="text" size="25" id="anss1" name="anss1" placeholder="Ответ 1"/>
                    <input type='radio' id='ch1' name='r' value='1' checked="checked"/> 
                </div>
                <div>
                    <input class="inpt" type="text" size="25" id="anss2" name="anss2" placeholder="Ответ 2"/>
                    <input type='radio' id='ch1' name='r' value='2'/> 
                    
                </div>
                <div>
                    <input class="inpt" type="text" size="25" id="anss3" name="anss3" placeholder="Ответ 3"/>
                    <input type='radio' id='ch1' name='r' value='3'/> 
                </div>
                <p class="msg">
                        <?php
                        echo $_SESSION['mes'];
                        unset($_SESSION['mes']);
                        ?>
                    </p>
                <button class="btn" type="submit">Добавить</button>
                <a href="adminPanel.php">Вернуться</a>
            </div>
        </form>
<?php

?>
  </div>
    </div>

</body>
</html>