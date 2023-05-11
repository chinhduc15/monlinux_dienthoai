<?php
        session_start();
        if(!isset($_SESSION['idAdmin'])){
            header("location: /monlinux/login.php");
        }
        session_write_close();
		$ct=mysqli_connect("localhost","root","","monlinux");
        //đã duyệt
		$lenh="SELECT * FROM donhang WHERE trangthai=1 ORDER BY idDonhang DESC ";
		$sql=mysqli_query($ct,$lenh);

        //chưa duyệt
        $lenh2="SELECT * FROM donhang WHERE trangthai=0 ORDER BY idDonhang DESC ";
		$sql2=mysqli_query($ct,$lenh2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/donhang_admin.css">
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
                <div id="td">Đơn hàng</div>
                <div>
                    <div>
                        <span onclick="daduyet()" id="dd">Đã duyệt</span>
                        <span onclick="chuaduyet()" id="cd">Chưa duyệt</span>
                    </div>
                    <div id="daduyet">
                        <table class="tb1">
                            <tr class="tittle">
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Tùy chọn</td>
                            </tr>

                            <?php
                                while ($row=mysqli_fetch_array($sql)) {		
                                    $idp=$row['idPhone'];
                                    $lenh1="SELECT * FROM phone WHERE idPhone=$idp";
                                    $sql1=mysqli_query($ct,$lenh1);
                                    $row1=mysqli_fetch_array($sql1)
                            ?>
                                 <tr>
                                <td><?php echo $row1['ten']?></td>
                                <td><?php echo $row['soluong']?></td>
                                <td><?php echo $row['soluong']*$row1['gia']?></td>
                                <td>
                                    <?php 
                                        if($row['trangthai']==1){
                                            echo "Đã duyệt";   
                                        }                                   
                                    ?>
                                </td>
                                <td>
                                    <a href="info_donhang.php?id=<?php echo $row['idDonhang']?>">Check</a>
                                </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div id="chuaduyet">
                        <table class="tb2">
                            <tr class="tittle2">
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Tổng tiền</td>
                                <td>Trạng thái</td>
                                <td>Tùy chọn</td>
                            </tr>

                            <?php
                                while ($row2=mysqli_fetch_array($sql2)) {		
                                    $idp=$row2['idPhone'];
                                    $lenh3="SELECT * FROM phone WHERE idPhone=$idp";
                                    $sql3=mysqli_query($ct,$lenh3);
                                    $row3=mysqli_fetch_array($sql3)
                            ?>
                            <tr>
                                <td><?php echo $row3['ten']?></td>
                                <td><?php echo $row2['soluong']?></td>
                                <td><?php echo $row2['soluong']*$row3['gia']?></td>
                                <td>
                                    <?php 
                                        if($row2['trangthai']==0){
                                            echo "Chưa duyệt";   
                                        }                                   
                                    ?>
                                </td>
                                <td>
                                    <a href="duyetdon.php?id=<?php echo $row2['idDonhang']?>">Duyệt đơn</a>
                                    <a href="huydon.php?id=<?php echo $row2['idDonhang']?>">Hủy đơn</a>
                                </td>

                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
<script>
    document.getElementById("dd").style.backgroundColor = "red";
    document.getElementById("chuaduyet").style.display = "none";
    function daduyet(){
        document.getElementById("chuaduyet").style.display = "none";
        document.getElementById("daduyet").style.display = "block";
        document.getElementById("dd").style.backgroundColor = "red";
        document.getElementById("cd").style.backgroundColor = "Transparent";
    }
    function chuaduyet(){
        document.getElementById("daduyet").style.display = "none";
        document.getElementById("chuaduyet").style.display = "block";
        document.getElementById("cd").style.backgroundColor = "red";
        document.getElementById("dd").style.backgroundColor = "Transparent";
    }
</script>