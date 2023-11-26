<?php
    session_start();
    require_once 'connect.php';
    if(!$_SESSION['username']){
        header('Location: index.php');
    }else if($_SESSION['username']=='admin'){
        header('Location: adminPanel.php');
    }
    if($_SESSION['test_end_time']){
        unset($_SESSION['end']);
        unset($_SESSION['test_end_time']);
        unset($_SESSION['test_start_time']);
        unset($_SESSION['randflag']);
    }
    if(!$_SESSION['randflag']){
        $query1="SELECT * FROM `DataTable`";
            $data = mysqli_query($connect, $query1);
            while($row=mysqli_fetch_assoc($data)){
            $new_array[] = $row;
            shuffle($new_array);
            }
        $_SESSION['randflag']='abc';
        $_SESSION['questions']=$new_array;
        $_SESSION['test_start_time']=new DateTime();
    }
    
    ?>

<!doctype html>
<html lang="ru">
<head>
  <title>Тест</title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script src="ajax.js"></script>
</head>
<body>
    <form action="checktest.php" method="post" id="ajax_form">
        <div>Привет, это тест на тему "Естествознание"<br>
        </div>
        
        <?php 
            $TestStartTime=$_SESSION['test_start_time']->format('H:i:s A') ;
            echo "Время начала тестирования: $TestStartTime, на тест отведена 1 минута.<br>"; 
            for($i=0; $i<5;$i++)
            {
                $id = $_SESSION['questions'][$i]["id"];
                $question= $_SESSION['questions'][$i]["question"];
                $answer1= $_SESSION['questions'][$i]["answer1"];
                $answer2=  $_SESSION['questions'][$i]["answer2"];
                $answer3= $_SESSION['questions'][$i]["answer3"];
                $answerseq= $_SESSION['questions'][$i]["answerseq"];
                echo "<label>$question</label>";
                echo"<div><input type='radio' id='$id.1' name='$i' value='$answer1'/> 
                <label for='ans1'>$answer1</label>
                </div>";
                echo"<div><input type='radio' id='$id.2' name='$i' value='$answer2'/> 
                <label for='ans2'>$answer2</label>
                </div>";
                echo"<div><input type='radio' id='$id.3' name='$i' value='$answer3'/> 
                <label for='ans3'>$answer3</label>
                </div>";
                echo "<br>";
            }
        ?> 
            <input type="submit" id="btnsend"  value="Закончить тест!" />
    </form>

</body>
</html>
