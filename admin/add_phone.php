<?php

    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_POST['btn'])) {
        $ten=$_POST['ten'];
        $hang=$_POST['hang'];
        $gia=$_POST['gia'];
        $cauhinh=$_POST['cauhinh'];
        $hinhanh=$_POST['hinhanh'];
        if($ten==""||$hang==""||$gia==""||$cauhinh==""||$hinhanh==""){
            $_SESSION['thongbao']="Vui lòng nhập đầy đủ !";
        }else{
            $lenh="INSERT INTO phone(ten,hang,gia,hinhanh,cauhinh) VALUES('$ten','$hang','$gia','$hinhanh','$cauhinh')";
            mysqli_query($ct,$lenh);
            header("location: phone_admin.php");
        }

        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_phone.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Add phone</title>
    <style>
        #m1{
            background-color: rgb(7, 128, 139);
            color: white;
        }
    </style>
</head>
<body>
    <div id="main">
        <?php include('../header.php'); ?>
        <div id="mid">
            <?php include('./list_admin.php'); ?>
            <div id="content">
                <div id="td">Add Phone</div>
                <div>
                    <div id="mess">
                        <?php 
				            if(isset($_SESSION['thongbao'])){        //thong bao
					        echo $_SESSION['thongbao'];
					        unset($_SESSION['thongbao']);
				            }
			            ?>
                    </div>
                    <form action="" id="f" method="post">
                        <div>Tên điện thoại <input type="text" name="ten"></div>
                        <div>Hãng
                            <select name="hang" id="">
                                <option value="Redmagic">Redmagic</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Oppo">Oppo</option>
                                <option value="Xiaomi">Xiaomi</option>
                                <option value="Redmi">Redmi</option>
                                <option value="Iphone">Iphone</option>
                            </select>
                        </div>
                        <div>Giá <input type="number" name="gia"></div>
                        <div id="inf">Cấu hình<textarea name="cauhinh" id="editor1" cols="30" rows="10"></textarea></div>
                        <div>Hình ảnh <input type="text" name="hinhanh"></div>
                        <button name="btn">Thêm</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>
        <script>

           CKEDITOR.replace( 'editor1',{
           		uiColor: '#14B8C4',
           		width:['600px'],height:['300px']
           } );

       </script>    