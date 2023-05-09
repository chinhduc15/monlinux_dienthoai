<?php
    
	$ct=mysqli_connect("localhost","root","","monlinux");
    if(isset($_POST['btn']) ){
        $tk=$_POST['tk'];
        $mk=$_POST['mk'];
        $rmk=$_POST['rmk'];
        if($tk==""||$mk==""||$rmk==""){
            session_start();
            $_SESSION['thongbao']="Vui lòng nhập đầy đủ !";
            session_write_close();
        }else{
            if($mk==$rmk){
                $lenh="SELECT * FROM user WHERE taikhoan='$tk' ";
			    $qr=mysqli_query($ct,$lenh);
                if(mysqli_num_rows($qr)>0){
                    session_start();
                    $_SESSION['thongbao']="Tài khoản đã tồn tại !";
                    session_write_close();               
                }else{
                    $lenh1="INSERT INTO user(taikhoan,matkhau,lv) VALUES('$tk','$mk',0)";
                    mysqli_query($ct,$lenh1);
                    session_start();
                    $_SESSION['thongbao']="Đăng kí thành công !";
                    session_write_close();
                }
            }else{
                session_start();
                $_SESSION['thongbao']="Mật khẩu không giống !";
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
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header.css">
   
    <title>Đăng nhập</title>
    
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div class="boddy">
            <div id="td">ĐĂNG KÝ</div>
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
                    <div class="u">Nhập lại mật khẩu</div>
                    <div><input type="password" name="rmk" placeholder="mật khẩu"></div>
                    <div class="btn"><button name="btn" id="btn">Đăng ký</button></div>
                    <div>Bạn có tài khoản? <a href="/monlinux/login.php">Đăng nhập ngay</a></div>
                </form>
                
            </div>
        </div>
    </div>
   
</body>
</html>