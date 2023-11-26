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
<div class="wrapper">
     <div class="answers_form">
<?php

echo "<table style='color: #f0f8ff;'  ><tr> <td >Вопрос</td><td>Ответ 1</td><td>Ответ 2</td><td>Ответ 3</td><td>Правильный ответ</td></tr>";
        $query123="SELECT * FROM `DataTable`";
            $data = mysqli_query($connect, $query123);
            while($row=mysqli_fetch_assoc($data)){
            $qarr[] = $row;
            }
 foreach($qarr as $row){
        $question= $row["question"];
        $answer1= $row["answer1"];
        $answer2=  $row["answer2"];
        $answer3= $row["answer3"];
        $rightans= $row["answerseq"];
        echo "<tr> <td>$question</td>   <td>$answer1</td>    <td>$answer2</td>   <td>$answer3</td>   <td>$rightans</td> </tr>";
    }
    echo"</table>";
?>
<form  action="addq.php">
<button class="btn" type="submit">Добавить</button>
</form>
  </div>
    </div>

</body>
</html>