<?php 
    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $lenh="UPDATE donhang SET trangthai='1' WHERE idDonhang=$id";
	$qr=mysqli_query($ct,$lenh);
                
    header("location: donhang_admin.php");
?>