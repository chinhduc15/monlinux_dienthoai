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
    $sql="SELECT * FROM phone WHERE idPhone=$id";
    $qr=mysqli_query($ct,$sql);
    $row=mysqli_fetch_array($qr);

    //cap nhat
		if (isset($_POST['btnU'])) {
			$ten=$_POST['ten'];
            $hang=$_POST['hang'];
            $gia=$_POST['gia'];
            $cauhinh=$_POST['cauhinh'];
            $hinhanh=$_POST['hinhanh'];
            if($ten==""||$hang==""||$gia==""||$cauhinh==""||$hinhanh==""){
                session_start();
                $_SESSION['thongbao']="Vui lòng nhập đầy đủ !";
                session_write_close();
            }else{
                $lenh="UPDATE phone SET ten='$ten',hang='$hang',gia='$gia',hinhanh='$hinhanh',cauhinh='$cauhinh' WHERE idPhone=$id";
			    $qr=mysqli_query($ct,$lenh);
                
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
    <link rel="stylesheet" href="../css/edit_phone.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Edit phone</title>
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
                <div id="td">Update Phone</div>
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
                        <div>Tên điện thoại <input type="text" name="ten" value="<?php echo $row['ten'];?>"></div>
                        <div>Hãng
                            <select name="hang" id="">
                                <option value="Redmagic" <?php if($row['hang']=='Redmagic') echo "selected"; ?>>Redmagic</option>
                                <option value="Samsung" <?php if($row['hang']=='Samsung') echo "selected"; ?>>Samsung</option>
                                <option value="Oppo" <?php if($row['hang']=='Oppo') echo "selected"; ?>>Oppo</option>
                                <option value="Xiaomi" <?php if($row['hang']=='Xiaomi') echo "selected"; ?>>Xiaomi</option>
                                <option value="Redmi" <?php if($row['hang']=='Redmi') echo "selected"; ?>>Redmi</option>
                                <option value="Iphone" <?php if($row['hang']=='Iphone') echo "selected"; ?>>Iphone</option>
                            </select>
                        </div>
                        <div>Giá <input type="number" name="gia" value="<?php echo $row['gia'];?>"></div>
                        <div>Cấu hình<textarea name="cauhinh" id="editor1" cols="30" rows="10" value="<?php echo $row['cauhinh'];?>"></textarea></div>
                        <div>Hình ảnh <input type="text" name="hinhanh" value="<?php echo $row['hinhanh'];?>"></div>
                        <button name="btnU">Update</button>
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
           		
           		width:['100%'],height:['300px']
           } );

       </script>    