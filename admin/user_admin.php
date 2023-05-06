<?php
		$ct=mysqli_connect("localhost","root","","monlinux");
		$lenh="SELECT * FROM user";
		$sql=mysqli_query($ct,$lenh);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_admin.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <title>User admin</title>
    <style>
        #m2{
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
                <div id="td">User</div>
                <div>
                    <table border="1" id="tb">
                        <tr>
                            <td id="name">Tên người dùng</td>
                            <td id="op">Tùy chọn</td>
                        </tr>
                        <?php
			                while ($row=mysqli_fetch_array($sql)) {
						
		                ?>
                        <tr>
                            <td><?php echo $row['taikhoan'];?></td>
                            <td>                              
                                <a href="">Delete</a>
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