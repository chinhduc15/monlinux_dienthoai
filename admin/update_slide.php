<?php
        session_start();
        if(!isset($_SESSION['idAdmin'])){
            header("location: /monlinux/login.php");
        }
        session_write_close();
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
        }
		$ct=mysqli_connect("localhost","root","","monlinux");
		$lenh="SELECT * FROM slide WHERE idSlide=$id";
		$sql=mysqli_query($ct,$lenh);
        $row=mysqli_fetch_array($sql);

        //cap nhat
		if (isset($_POST['btn'])) {
			$link=$_POST['link'];
            $lenh="UPDATE slide SET linkImage='$link' WHERE idSlide=$id";
			$qr=mysqli_query($ct,$lenh);
                
            header("location: slide_admin.php");
        }

            

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/update_slide.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <title>User admin</title>
    <style>
        #m3{
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
                <div id="td">User</div>
                <div>
                    <form action="" method="post">
                        <input type="text" name="link" value="<?php echo $row['linkImage'];?>">
                        <button name="btn">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>