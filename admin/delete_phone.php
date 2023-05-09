<?php
    session_start();
    if(!isset($_SESSION['idAdmin'])){
        header("location: /monlinux/login.php");
    }
    session_write_close();
    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $lenh="DELETE FROM phone WHERE idPhone=$id";
    $qr=mysqli_query($ct,$lenh);
    header("location: phone_admin.php");
?>