<?php
        $ct=mysqli_connect("localhost","root","","monlinux");
        if (isset($_GET['id'])) {
			$id=$_GET['id'];
		}
		
		$lenh="SELECT * FROM phone WHERE idPhone=$id";
		$sql=mysqli_query($ct,$lenh);
        $row=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/info_phone.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/lienhe.css">

    <title>Phone</title>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">THÔNG TIN ĐIỆN THOẠI</div>
            <div id="all_item">
                <div id="info">
                    <img src="<?php echo $row['hinhanh'];?>" alt="">
                    <div id="name"><?php echo $row['ten'];?></div>
                    <div>Hãng: <?php echo $row['hang'];?></div>
                    <div>Giá: <?php echo $row['gia'];?> VND</div>
                   <div> <a class="addcart" href="add_cart.php?id=<?php echo $row['idPhone'];?>">ĐẶT HÀNG NGAY</a></div>
                </div>
                <div id="info1">
                    <?php echo $row['cauhinh'];?>
                </div>
                
            </div>
        </div>
    </div>
    <?php include('lienhe.php'); ?>
</body>
</html>