<?php
//    ***LẤY THÔNG TIN LIÊN HỆ => TÁO ĐỎ
$sqlLienHe = "select * from tbl_lienhe";
$row = getRow($sqlLienHe);

//    ***LẤY THÔNG TIN => DANH MỤC SẢN PHẨM
$sqlDanhMucSp = "select * from tbl_danhmuc";
$result = getRow($sqlDanhMucSp);

//    ***LẤY THÔNG TIN => DANH MỤC BÀI VIẾT
$sqlDanhMucBaiViet = "select * from tbl_danhmucbaiviet";
$fields = getRow($sqlDanhMucBaiViet);

?>

<!--******FOOTER TOP*****-->

<div class="footer-top-area" style="margin-top: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="footer-about-us">
                    <h2>Táo<span> Đỏ</span></h2>
                    <?php
                    foreach ($row as $item) {
                        echo '<p>' . $item['thongtinlienhe'] . '</p>';
                    }
                    ?>
                    <div class="footer-social">
                        <a target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        <a target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Danh mục sản phẩm</h2>
                    <ul>
                        <?php
                        foreach ($result as $item) {
                            echo '<li><a href="index.php?quanly=danhmucsanpham&id=' . $item['id_danhmuc'] . '">' . $item['tendanhmuc'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Danh mục bài viết</h2>
                    <ul>
                        <?php
                        foreach ($fields as $item) {
                            echo '<li><a href="index.php?quanly=danhmucbaiviet&id=' . $item['id_danhmucbaiviet'] . '">' . $item['tendanhmuc_baiviet'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>  <!--******FOOTER TOP*****-->

<!--******FOOTER END*****-->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <?php
                    foreach ($row as $item) {
                        echo '<p>' . $item['copyright'] . '</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa-brands fa-apple-pay"></i>
                    <i class="fa-brands fa-cc-apple-pay"></i>
                </div>
            </div>
        </div>
    </div>
</div>  <!--******FOOTER TOP*****-->

<!--Link : https://codfe.com/danh-muc/lap-trinh-wordpress/thu-thuat/nut-lien-he-website/-->

<!--**********************NÚT LIÊN HỆ PHÍA TRÁI**************-->
<div class="fix_tel">
    <div class="ring-alo-phone ring-alo-green ring-alo-show" id="ring-alo-phoneIcon"
         style="right: 150px; bottom: -12px;">
        <div class="ring-alo-ph-circle">

        </div>
        <div class="ring-alo-ph-circle-fill">
        </div>
        <div class="ring-alo-ph-img-circle">
            <a href="tel:0912345678"><img class="lazy" src="https://codfe.com/wp-content/uploads/2020/08/call.png"
                                          alt="hotline"></a>
        </div>
    </div>
    <div class="tel">
        <a href="tel:0865578773">
            <p class="fone">
                086 55 78 773
            </p>
        </a>
    </div>
</div>
<!--**********************NÚT LIÊN HỆ PHÍA TRÁI**************-->

