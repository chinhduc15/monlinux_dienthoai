<?php 
  
    

    $ct=mysqli_connect("localhost","root","","monlinux");
    if (isset($_GET['id'])) {
        $idsp=$_GET['id'];
    }
    session_start();
    if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
        if(isset($_SESSION['idAdmin'])){
            $idU=$_SESSION['idAdmin'];
            session_write_close();
        }
        else if(isset($_SESSION['idUser'])){
            $idU=$_SESSION['idUser'];
            session_write_close();
        }
    }else{
        header("location: /monlinux/login.php");
    }
    //lay sản phẩm bằng id
    $lenh="SELECT * FROM phone WHERE idPhone=$idsp";
	$sql=mysqli_query($ct,$lenh);
    $row=mysqli_fetch_array($sql);

    //đặt hàng
    if(isset($_POST['btn']) ){
        $tennguoinhan=$_POST['tennguoinhan'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $sl=$_POST['soluong'];
        if($tennguoinhan==""||$sdt==""||$diachi==""){
            session_start();
            $_SESSION['thongbao']="Vui lòng nhập đầy đủ thông tin nhận hàng !";
            session_write_close();
        }else{
            if($sl<=0){
                session_start();
                $_SESSION['thongbao']="Số lượng phải lớn hơn 0 !";
                session_write_close();
            }else{
                $idsp=$_POST['idphone'];
                $lenh1="INSERT INTO donhang(idPhone,idUser,soluong,tennguoinhan,sdt,diachi,trangthai) VALUES('$idsp','$idU','$sl','$tennguoinhan','$sdt','$diachi','0')";
                mysqli_query($ct,$lenh1);
                echo '<script>alert("Đặt hàng thành công")</script>';
            }
            
        }

    }
    

?>
<?php
     if(isset($_POST['btnn']) ){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://bio.ziller.vn/api/qr/add",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer 6ea463bd3531c719d0be9155f54bbc8d",
                "Content-Type: application/json",
            ),
            
            CURLOPT_POSTFIELDS => json_encode(array (
                'type' => 'text',
                'data' => '2|99|0912350096|NGUYEN QUANG HUY||0|0|'.$_POST['sdt'].'|huy|',
                'background' => 'rgb(255,255,255)',
                'foreground' => 'rgb(0,0,0)',
                'logo' => 'https://site.com/logo.png',
                )),
                ));

        $response = curl_exec($curl);

        curl_close($curl);


        $huy = json_decode($response);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_cart.css">
    <link rel="stylesheet" href="css/header.css">
    
    <title>Phone</title>
</head>
<body >
    <input type="hidden" value="<?php echo $row['gia']?>" id="gia">
    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">TIẾN HÀNH ĐẶT HÀNG</div>
            <div id="all_item">
                
                <div>
                    <div class="td1">Thông tin sản phẩm</div>
                    <div id="infosp" >
                        <img src="<?php echo $row['hinhanh']?>" alt="" id="imgsp">
                        <div class="tt">
                            <div >Tên sản phẩm: 
                                <?php echo $row['ten']?>
                            </div>
                            <div >Hãng: 
                                <?php echo $row['hang']?>
                            </div>
                            <div >Giá:
                                <?php echo $row['gia']?>
                            </div>
                            <div >Số lượng: 
                                <input type="number" value="1" id="sl" onchange="soluong()">
                            </div>
                        </div>
                    </div>
                </div>
                <div  id="infosp2">
                    Tổng tiền : <span id="tongtien"></span>
                    
                </div>
                <hr>
                <form action="" method="post">
                <div class="ttnh">
                    <div class="td1">Thông tin nhận hàng</div>
                        <input type="hidden" value="<?php echo $row['idPhone']?>" name="idphone">
                        <input type="hidden" id="soluong" name="soluong">
                        <div id="mess">
                            <?php 
                                if(isset($_SESSION['thongbao'])){        //thong bao
                                    echo $_SESSION['thongbao'];
                                    unset($_SESSION['thongbao']);
                                }
                            ?>
                        </div>
                        <table class="tt2">
                            <tr>
                                <td>Tên khách hàng</td>
                                <td><input type="text" name="tennguoinhan" id="input"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="number" name="sdt" id="input" ></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="diachi" id="input"></td>
                            </tr>
                            <tr>
                                <td>Hình thức thanh toán:</td>
                                    
                                     <td><b>(Thanh toán khi nhận hàng)</b> </td>
                                
                            </tr>
                           
                        </table>
                       
                        <div class="btn"><button name="btn" class="bt">Đặt hàng</button></div>
                     
                    
                </div>
                
                
            </div>
        </div>
    </div>
   
</body>

</html>
<script>
    function soluong(){
        var sl=document.getElementById("sl").value;
        var gia=document.getElementById("gia").value;
        document.getElementById("soluong").value=sl;
        document.getElementById("tongtien").innerHTML=sl*gia;
    }
    soluong();

</script>

