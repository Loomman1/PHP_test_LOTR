<?php
    session_start();
    unset($_SESSION['message']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['randflag']);
    unset($_SESSION['test_end_time']);
    unset($_SESSION['test_start_time']);
    header('Location: index.php');
    ?>