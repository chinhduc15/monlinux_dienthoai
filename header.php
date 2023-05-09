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
<div id="huy">
    <div id="header">
        <div class="logo"><a href="/monlinux/home.php"><img src="/monlinux/images/logo.png" alt="" ></a></div>
        
        <div >
            <form class="timkiem"  action="/monlinux/search.php" method="post">
                <input  type="text" name="tukhoa">
                <button>Tìm</button>
            </form>
        </div>
        <div id="a">
            <?php
                if(isset($_SESSION['idUser']) ||isset($_SESSION['idAdmin'])){
                   
                    
                    echo '<a href="/monlinux/infor_user.php"><img src="https://img.icons8.com/?size=512&id=23265&format=png " alt="" width="40px">'.$rowUser['taikhoan'].'</a>';
                    echo '<a href="/monlinux/logout.php"><img src="https://img.icons8.com/?size=512&id=j8vtslxN0LJo&format=png" alt="" width="40px"></a>';
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
