<?php
    
	$ct=mysqli_connect("localhost","root","","monlinux");
    if(isset($_POST['btn']) ){
        $tk=$_POST['tk'];
        $mk=$_POST['mk'];
        if($tk==""||$mk==""){
            session_start();
            $_SESSION['thongbao']="Vui lòng nhập đầy đủ !";
            session_write_close();
        }else{
            $lenh="SELECT * FROM user WHERE taikhoan='$tk' AND matkhau='$mk' ";
			$qr=mysqli_query($ct,$lenh);
            if(mysqli_num_rows($qr)>0){
                $row=mysqli_fetch_array($qr);
                if($row['lv']<3){
                    session_start();
                    $_SESSION['idUser']=$row['idUser'];
                    header("location: /monlinux/phone.php");
                }else{
                    session_start();
                    $_SESSION['idAdmin']=$row['idUser'];
                    header("location: /monlinux/phone.php");
                }
                
            }else{
                session_start();
                $_SESSION['thongbao']="Sai tài khoản hoặc mật khẩu !";
                session_write_close();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    
    <title>Đăng nhập</title>
    
</head>
<body>
    
    <div id="main">
        <?php include('header.php'); ?>
        <div class="boddy">
            <div id="td">ĐĂNG NHẬP</div>
            <div id="all_item">
                <div id="mess">
                    <?php 
                        if(isset($_SESSION['thongbao'])){        //thong bao
                            echo $_SESSION['thongbao'];
                            unset($_SESSION['thongbao']);
                        }
			        ?>
                </div>
                <form action="" method="post">
                    <div class="u">Tài khoản</div>
                    <div><input type="text" name="tk" placeholder="tài khoản"></div>
                    <div class="u">Mật khẩu</div>
                    <div><input type="password" name="mk" placeholder="mật khẩu"></div>
                    <div class="btn"><button name="btn" id="btn">Đăng nhập</button></div>
                    <div>Bạn chưa có tài khoản? <a href="/monlinux/register.php">Đăng kí ngay</a></div>
                </form>
                
            </div>
        </div>
       
    </div>
    
</body>
</html>