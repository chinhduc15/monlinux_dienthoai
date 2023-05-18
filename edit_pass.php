<?php
   $ct=mysqli_connect("localhost","root","","monlinux");
   session_start();
   if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
       if(isset($_SESSION['idAdmin'])){
           $id=$_SESSION['idAdmin'];
           session_write_close();
       }
       else if(isset($_SESSION['idUser'])){
           $id=$_SESSION['idUser'];
           session_write_close();
       }
   
   }else{
       header("location: /monlinux/login.php");
   }
    
    if(isset($_POST['submit']) ){
        $mkcu=$_POST['mkcu'];
        $mk=$_POST['mk'];
        $rmk=$_POST['rmk'];
        if ($mkcu == "" || $mk == "" || $rmk == "") {
            session_start();
            $_SESSION['thongbao']="Vui lòng nhập đầy đủ";
            session_write_close(); 
        } else {
            $lenh="SELECT * FROM user WHERE  matkhau='$mkcu' AND idUser ='$id' ";
			$qr=mysqli_query($ct,$lenh);

            if(mysqli_num_rows($qr)==0){
                session_start();
                 $_SESSION['thongbao']="sai mật khẩu củ";
                 session_write_close(); 
            }else{
            if($mk==$rmk ){
               
                $lenh="UPDATE user SET matkhau ='$mk' WHERE idUser=$id";
                $qr=mysqli_query($ct,$lenh);

                

                echo '<script>alert("Đổi mật khẩu thành công!");</script>';

                
                
            }else{

                session_start();
                $_SESSION['thongbao']="Mật khẩu không giống !";
                session_write_close();
            }  
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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/edit_pass.css">
    <link rel="stylesheet" href="css/list_user.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div id="content">
                <?php include('list_user.php'); ?>
                
                <div id="right">
                        <div id="mess">
                            <?php 
                                if(isset($_SESSION['thongbao'])){        //thong bao
                                    echo $_SESSION['thongbao'];
                                    unset($_SESSION['thongbao']);
                                }
                            ?>
                        </div>
                    <form action="" method="post">
                    <div>
                        <label for="currentPassword">mật khẩu hiện tại:</label>
                        <input type="password" id="currentPassword" name="mkcu" required>

                        <label for="newPassword">mật khẩu mới:</label>
                        <input type="password" id="newPassword" name="mk" required>

                        <label for="confirmPassword">nhập lại mật khẩu:</label>
                        <input type="password" id="confirmPassword" name="rmk" required>

                        <button name="submit">Update</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>