<?php
        session_start();
        if(!isset($_SESSION['idAdmin'])){
            header("location: /monlinux/login.php");
        }
        session_write_close();
		$ct=mysqli_connect("localhost","root","","monlinux");
		$lenh="SELECT * FROM slide";
		$sql=mysqli_query($ct,$lenh);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/silde_admin.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <title>Slide</title>
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
                <div id="td">Update slide</div>
                <div id="cc">
                    <?php
			            while ($row=mysqli_fetch_array($sql)) {
						
		            ?>
                    <div>
                        <img src="<?php echo $row['linkImage'];?>" alt="ko co anh" class="img">
                        <a class="up" href="update_slide.php?id=<?php echo $row['idSlide'];?>">Update</a>
                    </div>
                    
                    
                   <?php } ?>
                </div>
                
            </div>
        </div>

    </div>
</body>
</html>