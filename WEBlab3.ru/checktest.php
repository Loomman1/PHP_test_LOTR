<?php
    session_start();
    require_once 'connect.php';
    if(!$_SESSION['username']){
        header('Location: index.php');
    }else if($_SESSION['username']=='admin')
    {
      header('Location: adminPanel.php');
    }
    else{
        echo "Вы ответили:"."<br>";
        $score=0;
                if($_POST['0']==$_SESSION['questions'][0]["answerseq"]){$score+=1;}
                if($_POST['1']==$_SESSION['questions'][1]["answerseq"]){$score+=1;}
                if($_POST['2']==$_SESSION['questions'][2]["answerseq"]){$score+=1;}
                if($_POST['3']==$_SESSION['questions'][3]["answerseq"]){$score+=1;}
                if($_POST['4']==$_SESSION['questions'][4]["answerseq"]){$score+=1;}
                $ans1=$_POST['0'];
                $ans2=$_POST['1'];
                $ans3=$_POST['2'];
                $ans4=$_POST['3'];
                $ans5=$_POST['4'];
             echo $ans1."(".$_SESSION['questions'][0]["answerseq"].")"."<br>";
             echo $ans2."(".$_SESSION['questions'][1]["answerseq"].")"."<br>";
             echo $ans3."(".$_SESSION['questions'][2]["answerseq"].")"."<br>";
             echo $ans4."(".$_SESSION['questions'][3]["answerseq"].")"."<br>";
             echo $ans5."(".$_SESSION['questions'][4]["answerseq"].")"."<br>";

             echo "<br> Вы набрали ".$score." из 5 баллов";
             $userID=$_SESSION['idshnik'];
             $userNAME= $_SESSION['username'];
            if(!$_SESSION['test_end_time'])
            {
             $_SESSION['test_end_time']=new DateTime();
            }
             $startTime=$_SESSION['test_start_time']->format('H:i:s A');
             $endTime=$_SESSION['test_end_time']->format('H:i:s A');
             $startsec=$_SESSION['test_start_time']->format('s');
             $endsec=$_SESSION['test_end_time']->format('s');
             echo "<br>Время начала теста:".$startTime;
             echo "<br>Время окончания теста:".$endTime;
             $secs=$_SESSION['test_end_time']->getTimestamp()-$_SESSION['test_start_time']->getTimestamp();
             echo "<br>Секунд потрачено на тест: $secs";
             $flag=1;
             if((int)$secs>(int)60){
               echo "<br>Вы проходили тест дольше минуты, результаты будут аннулированы!<br>";
                $flag=2;
                $score=0;
             }else{
               echo "<br>Вы успели пройти тест!<br>";
                $flag=1;
             }
             $endDate=$_SESSION['test_end_time']->format('Y-m-d H:i:s');
             $rezq="INSERT INTO `resultats` (`id`, `user_id`, `username`, `score`, `max`, `time`, `flag`, `date`) 
             VALUES (NULL,'$userID','$userNAME','$score','5','$secs','$flag', '$endDate')";

             $ansquery="INSERT INTO `results` (`id`, `user_id`, `username`, `score`, `max`, `time`, `flag`) 
             VALUES (NULL,'$userID','$userNAME','$score','5','$secs','$flag')";
             if(!$_SESSION['end'])
             {
                mysqli_query($connect, $ansquery);
                mysqli_query($connect, $rezq);
                $_SESSION['end']="done";
             }
    }
    ?>

<!doctype html>
<html lang="ru">
<head>
  <title>Тест</title>
</head>
<body>
<form  action="menu.php">
<button class="btn" type="submit">Окей</button>
</form>
</body>
</html>