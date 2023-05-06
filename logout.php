<?php
    session_start();
    if(isset($_SESSION['idAdmin'])){
        session_destroy();
        header("location: /monlinux/login.php");
    }
    else if(isset($_SESSION['idUser'])){
        session_destroy();
        header("location: /monlinux/login.php");
    }

?>
