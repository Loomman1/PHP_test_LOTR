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


$queryanswers="SELECT * FROM `resultats`";
$answrs = mysqli_query($connect, $queryanswers);
if(mysqli_num_rows($answrs)>0){
    
    while($row=mysqli_fetch_assoc($answrs)){
        $arrans[] = $row;
    }
    echo "<table ><tr> <td >Пользователь</td><td>Оценка</td><td>Время прохождения теста (с)</td><td>Дата прохождения</td></tr>";
    foreach($arrans as $row){
        $user= $row["username"];
        $score= $row["score"];
        $time=  $row["time"];
        $flag= $row["flag"];
        $date= $row["date"];
        if($flag==2)
        {
            echo "<tr style='color: #ff0000;'> <td>$user</td>   <td>$score/5</td>    <td>$time/60</td>   <td>$date</td>    </tr>";
        }else{
        echo "<tr> <td>$user</td>   <td>$score/5</td>    <td>$time/60</td>   <td>$date</td>    </tr>";
        }
    }
    echo"</table>";
}
 
?>
  </div>
    </div>

</body>
</html>