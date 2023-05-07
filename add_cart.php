<?php 
    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $idsp=$_GET['id'];
    }
    session_start();
    if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
        if(isset($_SESSION['idAdmin'])){
            $idU=$_SESSION['idAdmin'];
            session_write_close();
        }
        else if(isset($_SESSION['idUser'])){
            $idU=$_SESSION['idUser'];
            session_write_close();
        }
    }
    $lenh="INSERT INTO cart(idUser,idPhone,qty,statuss) VALUES('$idU','$idsp','1','0')";
    mysqli_query($ct,$lenh);
    header("location: cart_user.php");
?>
