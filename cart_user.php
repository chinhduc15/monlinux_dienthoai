
<?php
    
        $ct=mysqli_connect("localhost","root","","monlinux");
        session_start();
        if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
            if(isset($_SESSION['idAdmin'])){
                $id=$_SESSION['idAdmin'];
                $lenh="SELECT * FROM user WHERE idUser=$id";
		        $sql=mysqli_query($ct,$lenh);
                session_write_close();
            }
            else if(isset($_SESSION['idUser'])){
                $id=$_SESSION['idUser'];
                $lenh="SELECT * FROM user WHERE idUser=$id";
		        $sql=mysqli_query($ct,$lenh);
                session_write_close();
            }
        
        }
        
		$lenh1="SELECT * FROM cart WHERE idUser=$id";

		$sql1=mysqli_query($ct,$lenh1);
       
		$row1=mysqli_fetch_array($sql1);

        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart_user.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Document</title>
</head>
<body>

    <div id="main">
        <?php include('header.php'); ?>
        <div>
            <div id="td">Giỏ hàng</div>
            <div id="all_item">
            <form action="Order.php" method="post">  
            <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td>Giá</td> 
                <td>Số lượng</td> 
                <td>Chọn</td>
            </tr>
            <?php
                while ($row1=mysqli_fetch_array($sql1)) {
                $idP=$row1['idPhone'];
                $lenh2="SELECT * FROM phone WHERE idPhone=$idP";
                $sql2=mysqli_query($ct,$lenh2);
                $row2=mysqli_fetch_array($sql2);
                
            ?>
            <tr>
                <td><?php echo $row2['ten'];?></td>
                <td><?php echo $row2['gia'];?></td>
                <td><input type="number" name="qty[]" value="<?php echo $row1['qty']; ?>" onchange="updateCart()"></td>
				<td><input type="checkbox" name="selected" value="<?php echo $row2['idPhone']; ?>" data-quantity="<?php echo $row1['qty']; ?>" data-price="<?php echo $row2['gia']; ?>" onchange="updateCart()" onclick="updateCart()"></td>
            </tr>
            <?php } ?>
            </table>
            <br>
            <div id="total">
            Tổng số lượng: <span id="qty-total">0</span> - Tổng giá tiền: <span id="price-total">0</span>
            </div>
            <hr>
            <h1>Thông tin đặt hàng</h1>
            <div>
             
                <label for="name">Họ và tên:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" required><br>

                    <label for="address">Địa chỉ:</label>
                    <textarea id="address" name="address" required></textarea><br>
                </div>
                <div>
                    <button > đặt hàng </button>
                </div>
            </form>
            <script>
                // Lấy tất cả các ô nhập số lượng
           // Lấy tất cả các ô nhập số lượng
                var qtyInputs = document.querySelectorAll('input[type="number"][name="qty[]"]');

                // Đính kèm sự kiện onchange vào từng ô nhập số lượng
                qtyInputs.forEach(function(input) {
                    input.addEventListener('change', function() {
                        updateCart();
                    });
                        });
                // Lấy tất cả các ô chọn sản phẩm
                var checkboxes = document.querySelectorAll('input[type="checkbox"][name="selected"]');

                // Đính kèm sự kiện onchange vào từng ô chọn sản phẩm
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        updateCart();
                    });
                });

        function updateCart() {
            // Lấy tất cả các ô chọn sản phẩm đã được chọn
            var checkboxes = document.querySelectorAll('input[type="checkbox"][name="selected"]:checked');

            var totalQuantity = 0;
            var totalPrice = 0;

            // Duyệt qua các ô chọn sản phẩm đã được chọn
            checkboxes.forEach(function(checkbox) {
                // Lấy số lượng và giá tiền của sản phẩm tương ứng
                var quantityInput = checkbox.parentElement.parentElement.querySelector('input[type="number"][name="qty[]"]');
                var quantity = parseInt(quantityInput.value);
                var price = parseInt(checkbox.getAttribute('data-price'));

                // Tính toán tổng số lượng và giá tiền
                totalQuantity += quantity;
                totalPrice += quantity * price;
            });

            // Cập nhật thông tin tổng số lượng và giá tiền trên giao diện
            document.getElementById('qty-total').innerHTML = totalQuantity;
            document.getElementById('price-total').innerHTML = totalPrice;
        }

            </script>

           
        </div>
    </div>
</body>
</html>



