<?php 
    if(!isset($_SESSION['idUser'])){
        header("location: /monlinux/login.php");
    }
    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    
    $lenh="DELETE FROM donhang WHERE idDonhang=$id";
	$qr=mysqli_query($ct,$lenh);
                
    header("location: /monlinux/cart_user.php");
?>