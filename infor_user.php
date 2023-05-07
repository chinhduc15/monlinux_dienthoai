
<?php
        $ct=mysqli_connect("localhost","root","","monlinux");
        session_start();
        if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
            if(isset($_SESSION['idAdmin'])){
                $id=$_SESSION['idAdmin'];
                $lenh="SELECT * FROM user WHERE idUser=$id";
		        $sql=mysqli_query($ct,$lenh);
                session_write_close();
            }
            else if(isset($_SESSION['idUser'])){
                $id=$_SESSION['idUser'];
                $lenh="SELECT * FROM user WHERE idUser=$id";
		        $sql=mysqli_query($ct,$lenh);
                session_write_close();
            }
        
        }
		
		
        $row=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/infor_user.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">THÔNG TIN NGƯỜI DÙNG</div>
            <div id="all_item">
            <div > tên tài khoản : <?php echo $row['taikhoan']?></div>
            <div ><a href="cart_user.php">giỏ hàng</a></div>
              
                
            </div>
        </div>
    </div>
</body>
</html>