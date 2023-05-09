
<?php
       
        $ct=mysqli_connect("localhost","root","","monlinux");
        session_start();
        if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
            if(isset($_SESSION['idAdmin'])){
                $id=$_SESSION['idAdmin'];
                session_write_close();
            }
            else if(isset($_SESSION['idUser'])){
                $id=$_SESSION['idUser'];
                session_write_close();
            }
        
        }else{
            header("location: /monlinux/login.php");
        }
        
		$lenh="SELECT * FROM donhang WHERE idUser=$id ORDER BY idDonhang DESC";

		$sql=mysqli_query($ct,$lenh);
       

        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart_user.css">
    <link rel="stylesheet" href="css/list_user.css">
    <link rel="stylesheet" href="css/header.css">
    
    <title>Document</title>
</head>
<body>
    <div id="main">
        <?php include('header.php'); ?>
        <div id="content">
            <?php include('list_user.php'); ?>
            <div id="right">
                <div id="td">Đơn hàng của bạn</div>
                <div>
                    <table>
                        <tr>
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
                            <td><?php echo $row1['ten'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td>
                                <?php 
                                    echo $row['soluong']*$row1['gia'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row['trangthai']==0){
                                        echo "Chờ duyệt";
                                    }else if($row['trangthai']==1){
                                        echo "Đã duyệt";
                                    }else if($row['trangthai']==2){
                                        echo "Đã hủy";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row['trangthai']==0){
                                        echo '<a href="/monlinux/huydon_user.php?id='.$row['idDonhang'].'">Hủy đơn hàng</a>';
                                    }else if($row['trangthai']==1){
                                        echo "";
                                    }else if($row['trangthai']==2){
                                        echo '<a href="/monlinux/huydon_user.php?id='.$row['idDonhang'].'">Hủy đơn hàng</a>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                
                

            </div>
        </div>
    </div>
    
</body>
</html>



