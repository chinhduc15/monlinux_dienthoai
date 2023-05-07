<?php
		$ct=mysqli_connect("localhost","root","","monlinux");
		$lenh="SELECT * FROM phone ORDER BY idPhone DESC LIMIT 5";
		$sql=mysqli_query($ct,$lenh);
        $lenh1="SELECT * FROM slide";
		$sql1=mysqli_query($ct,$lenh1);

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/phone.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Phone</title>
    <style>
        #h1{
            background-color: rgb(82 139 139);
            color: white;
        }
    </style>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">HOME</div>
            
           
            <div class="slideshow">
                <div class="slides">
                    <?php
                        while ($row1=mysqli_fetch_array($sql1)) {						
                    ?>
                        <img src="<?php echo $row1['linkImage'];?>">
                    <?php } ?>
                </div>
            </div>
            <div>
                <h1>SẢN PHẨM MỚI NHẤT</h1>
            </div>
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
    </div>
</body>

</html>
