<?php

		$ct=mysqli_connect("localhost","root","","monlinux");
        $tukhoa=$_POST['tukhoa'];
		$lenh="SELECT * FROM phone WHERE ten LIKE '%$tukhoa%'";
		$sql=mysqli_query($ct,$lenh);
        $dulieu=mysqli_num_rows($sql);

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Phone</title>
    <style>
        #h2{
            background-color: rgb(82 139 139);
            color: white;
        }
    </style>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">KẾT QUẢ TỪ KHÓA: 
                <?php 
                    echo $tukhoa ;
                ?>
            </div>
            <div id="khong">
                <?php
                   
                    if($dulieu==0||$tukhoa==""){
                        echo "Không tìm thấy kết quả !";
                    }else{
                ?>
            </div>
            <div id="all_item">
                <?php
			        while ($row=mysqli_fetch_array($sql)) {						
		        ?>
                <a href="info_phone.php?id=<?php echo $row['idPhone'];?>" class="item">
                    <img src="<?php echo $row['hinhanh'];?>" alt="">
                    <div id="name"><?php echo $row['ten'];?></div>
                </a>
                <?php } }?>
                
            </div>
        </div>
    </div>
</body>
</html>