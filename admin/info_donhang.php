<?php
    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $sql="SELECT * FROM donhang WHERE idDonhang=$id";
    $qr=mysqli_query($ct,$sql);
    $row=mysqli_fetch_array($qr);

    $idsp=$row['idPhone'];
    $sql1="SELECT * FROM phone WHERE idPhone=$idsp";
    $qr=mysqli_query($ct,$sql1);
    $row1=mysqli_fetch_array($qr);

		

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/info_donhang.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <title>Phone admin</title>
    <style>
        #m4{
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
                <div id="td">Chi tiết đơn hàng</div>               
                <div id="conten">
                    <div class="tdsp">Thông tin sản phẩm</div>
                    <div id="tt">
                        <img src="<?php echo $row1['hinhanh']?>" alt="" id="im">
                        <div>
                            <div>Tên sản phẩm: <?php echo $row1['ten']?></div>
                            <div>Hãng: <?php echo $row1['hang']?></div>
                            <div>Giá: <?php echo $row1['gia']?></div>
                            <div>Số lượng: <?php echo $row['soluong']?></div>
                        </div>
                    </div>
                    <div class="tdsp">Thông tin người nhận</div>
                    <div>
                        <div>Tên người nhận: <?php echo $row['tennguoinhan']?></div>
                        <div>Số điện thoại: <?php echo $row['sdt']?></div>
                        <div>Địa chỉ: <?php echo $row['diachi']?></div>
                    </div>
                    <div class="tdsp">Tổng tiền: <?php echo $row['soluong']*$row1['gia']?></div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>