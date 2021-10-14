<?php
    session_start();
    $evtusername = $_POST['username'];
    $evtpassword = $_POST['password'];
    if ($evtusername == "adminnetflixFO" && $evtpassword == "adminbangjago"){
        $_SESSION['admin'] = 1;
    }
    $dbh = NULL;

    header('Location: ../index.php');

    exit();
?>