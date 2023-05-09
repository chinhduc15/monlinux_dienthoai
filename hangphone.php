<?php
        $ct=mysqli_connect("localhost","root","","monlinux");
        if (isset($_GET['hang'])) {
			$hang=$_GET['hang'];
		}
		
		$lenh="SELECT * FROM phone WHERE hang='$hang'";
		$sql=mysqli_query($ct,$lenh);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hangphone.css">
    <link rel="stylesheet" href="css/header.css">
    
    <title>Phone</title>
    <style>
        #h3{
            background-color: rgb(82 139 139);
            color: white;
        }
    </style>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">HÃNG: <?php echo $hang; ?></div>
            <div id="all_item">
                <?php
			        while ($row=mysqli_fetch_array($sql)) {						
		        ?>
                <a href="info_phone.php?id=<?php echo $row['idPhone'];?>" class="item">
                    <img src="<?php echo $row['hinhanh'];?>" alt="">
                    <div id="name"><?php echo $row['ten'];?></div>
                </a>
                <?php } ?>
                
            </div>
        </div>
    </div>
    
</body>
</html>