<?php
    session_start();
    require_once 'connect.php';
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
</head>
<body>

<?php
if(($_POST['q']!='')&&($_POST['anss1']!='')&&($_POST['anss2']!='')&&($_POST['anss3']!='')){
        echo "Успех!";
        $que=$_POST['q'];
        $ans1=$_POST['anss1'];
        $ans2=$_POST['anss2'];
        $ans3=$_POST['anss3'];
        $rightans='';
        if($_POST['r']=='1'){$rightans=$ans1;}
        else if($_POST['r']=='2'){$rightans=$ans2;}
        else if($_POST['r']=='3'){$rightans=$ans3;}


        $qqqery="INSERT INTO `DataTable` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answerseq`) 
        VALUES (NULL, '$que', '$ans1', '$ans2', '$ans3', '$rightans')";
        mysqli_query($connect, $qqqery);
        header('Location: checkq.php');
        }else{
            $_SESSION['mes']="Ошибка, заполните все поля!";
            header('Location: addq.php');
        }

?>
</body>
</html>