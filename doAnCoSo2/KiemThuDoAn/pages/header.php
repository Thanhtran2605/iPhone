<?php
ob_start();

$sqlDanhMuc = "select * from tbl_danhmuc order by id_danhmuc desc";

$row = getRow($sqlDanhMuc);

?>


<!--Nếu GET MÀ ĐĂNG XUẤT HOẶC ĐĂNG XUẤT == 1 THÌ UNSET SESSION[DANGKY]-->
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="index.php"><img src="img/logooffice.jpg"></a></h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shopping-item">
                    <a href="index.php?quanly=giohang" style="color: white!important;">Giỏ hàng<i
                                class="fa fa-shopping-cart"></i> <span
                                class="product-count">
                            <?php
                            $count = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $count++;
                                }
                            }
                            echo $count;
                            ?>
                            </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Trang chủ</a></li>

                    <?php
                    foreach ($row as $item) {
                        echo '<li><a href="index.php?quanly=danhmucsanpham&id=' . $item['id_danhmuc'] . '">' . $item['tendanhmuc'] . '</a></li>';
                    }
                    ?>

                    <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                    <!--        Giỏ hàng chỉ có một giỏ-->

                    <li><a href="index.php?quanly=tintuc">Tin tức</a></li>

                    <?php
                    if (isset($_SESSION['dangky'])) {
                        echo '<li><a href="index.php?quanly=donhangdamua">Lịch sử đơn hàng</a></li>';
                        echo '<li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>';
                        echo '<li><a href="index.php?dangxuat=1">Đăng xuất</a></li>';
                    } else {
                        echo '<li><a href="index.php?quanly=dangky">Đăng ký</a></li>';
                    }
                    ?>

                    <li style="margin-top: 10px;">
                        <form action="index.php?quanly=timkiem" method="POST">
                            <input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
                            <input type="submit" name="timkiem" value="Tìm kiếm">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


