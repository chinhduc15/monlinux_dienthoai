<?php
        session_start();
        if(!isset($_SESSION['idAdmin'])){
            header("location: /monlinux/login.php");
        }
        session_write_close();
		$ct=mysqli_connect("localhost","root","","monlinux");
		$lenh="SELECT * FROM phone ORDER BY idPhone DESC";
		$sql=mysqli_query($ct,$lenh);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phone_admin.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/list_admin.css">
    <title>Phone admin</title>
    <style>
        #m1{
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
                <div id="td">Phone</div>
                <div id="add"><a href="add_phone.php">Add phone</a></div>
                <div>
                    <table border="1" id="tb">
                        <tr id="namecot">
                            <td id="name">Tên điện thoại</td>
                            <td id="op">Tùy chọn</td>
                        </tr>

                        <?php
			                while ($row=mysqli_fetch_array($sql)) {
						
		                ?>
                        <tr>
                            <td><div id="namephone"><?php echo $row['ten'];?></div></td>
                            <td>
                                <a href="/monlinux/info_phone.php?id=<?php echo $row['idPhone'];?>">Check</a>
                                <a href="edit_phone.php?id=<?php echo $row['idPhone'];?>">Update</a>
                                <a href="delete_phone.php?id=<?php echo $row['idPhone'];?>">Delete</a>
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