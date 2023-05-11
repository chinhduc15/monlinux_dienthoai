
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
    <link rel="stylesheet" href="css/list_user.css">
    <title>thong tin nguoi dung</title>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div id="content">
            <?php include('list_user.php'); ?>
            <div id="right">
                <div id="td">Thông tin cá nhân</div>
                <div id="nd">
                    <div class="u"><span>Tên tài khoản:</span> <?php echo $row['taikhoan']?></div>
                    <div class="u"><span>Mật khẩu:</span> *******</div>
                </div>
                
                

            </div>
        </div>
    </div>
</body>
</html>