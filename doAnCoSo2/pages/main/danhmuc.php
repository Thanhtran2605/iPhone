<!--***********************KHI CLICK VÀO ĐIỆN THOẠI DI ĐỘNG TRÊN HEADER THANH NAVBAR-->

<?php
//****LẤY SẢN PHẨM******//
$sqlSanPham = "select * from tbl_sanpham where tbl_sanpham.id_danhmuc = '$_GET[id]' order by id_sanpham desc";

$row = getRow($sqlSanPham);


//****LẤY TÊN DANH MỤC SẢN PHẨM******//
$sqlDanhMuc = "select * from tbl_danhmuc where tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";

$resultNameCategory = getRow($sqlDanhMuc);
?>

<!--****************GET SẢN PHẨM IPHONE*******************-->
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <h2 class="section-title">SẢN PHẨM</h2>
            <h3 style="font-size: 18px; margin-left: 15px;">Danh mục sản phẩm:
                <?php
                foreach ($resultNameCategory as $item) {
                    echo $item['tendanhmuc'];
                }
                ?>
            </h3>

            <!--SẢN PHẨM MỘT-->
            <?php
            foreach ($row as $item) {
                echo '  <div class="col-md-3">
                <div class="latest-product" >

                    <div class="single-product" >
                        <div class="product-f-image" >
                            <img src="admincp/modules/quanlysanpham/uploads/' . $item['hinhanh'] . '">
                            <div class="product-hover">
                                <a href="index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '" class="add-to-cart-link">
                                    <i class="fa fa-shopping-cart"></i>Xem chi tiết
                                </a>
                            </div>
                        </div>
                        <h2><a class="title_product" href="index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '">Tên sản phẩm : ' . $item['tensanpham'] . '</a></h2>
                        <div class="product-carousel-price">
                             <p class="price_product"><ins> Giá: ' . number_format($item['giasanpham'], 0, ',', '.') . ' VNĐ </ins >
                        </div>
                            <br ><del > ' . number_format($item['giasanpham'] + 100000, 0, ',', '.') . ' VNĐ </del ></p >  
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>
    </div>
</div>
