<?php
    session_start();
    if(isset($_SESSION['idAdmin'])||isset($_SESSION['idUser'])){
        if(isset($_SESSION['idAdmin'])){
            $id=$_SESSION['idAdmin'];
        }
        else if(isset($_SESSION['idUser'])){
            $id=$_SESSION['idUser'];
        }
        $lenh1="SELECT * FROM user WHERE idUser=$id";
		$sqlU=mysqli_query($ct,$lenh1);
        $rowUser=mysqli_fetch_array($sqlU);
    }
?>
<div>
    <div id="header">
        <div>Dienthoai</div>
        <div>
            <form action="/monlinux/search.php" method="post">
                <input type="text" name="tukhoa">
                <button>Tìm</button>
            </form>
        </div>
        <div>
            <?php
                if(isset($_SESSION['idUser']) ||isset($_SESSION['idAdmin'])){
                   
                    echo '<a href="/monlinux/infor_user.php">'.$rowUser['taikhoan'].'</a>';
                    echo '<a href="/monlinux/logout.php">Đăng xuất</a>';
                }else{
                    echo '<a href="/monlinux/login.php">Đăng nhập</a>';
                }
            ?>
        </div>

    </div>
    <div id="menu">
        <div><a href="/monlinux/home.php" class="a" id="h1">Home</a></div>
        <div><a href="/monlinux/phone.php" class="a" id="h2">Phone</a></div>   
        <div class="menu1">
            <div class="h" id="h3">Hãng</div>
            <div id="menu2">
                <a href="/monlinux/hangphone.php?hang=Redmagic">Redmagic</a>
                <a href="/monlinux/hangphone.php?hang=Samsung">Samsung</a>
                <a href="/monlinux/hangphone.php?hang=Iphone">Iphone</a>
                <a href="/monlinux/hangphone.php?hang=Oppo">Oppo</a>
                <a href="/monlinux/hangphone.php?hang=Redmi">Redmi</a>
                <a href="/monlinux/hangphone.php?hang=Xiaomi">Xiaomi</a>
            </div>
            
        </div>
        <div>
            <?php 
                if(isset($_SESSION['idAdmin'])){
                    echo '<a href="/monlinux/admin/phone_admin.php" class="a">Admin</a>';
                }
            ?>
            
        </div>
    </div>
</div>