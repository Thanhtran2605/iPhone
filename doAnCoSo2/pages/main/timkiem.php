<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];

} else {
    $tukhoa = '';
}
$sql = "select * from tbl_sanpham inner join tbl_danhmuc on tbl_sanpham.id_danhmuc
         = tbl_danhmuc.id_danhmuc and tbl_sanpham.tensanpham like '%" . $tukhoa . "%'";

$row = getRow($sql);

?>

<!--****************GET SẢN PHẨM IPHONE*******************-->
<div class="maincontent-area">
    <div class="container">
        <div class="row">
            <h2 class="section-title">KẾT QUẢ TÌM KIẾM</h2>
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
                            <h2 >Danh mục : ' . $item['tendanhmuc'] . '</h2 >
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
        <?php
        if (count($row) <= 0) {
            echo '<p style="color: red; text-align: center;">Chưa có sản phẩm hiển thị phù hợp</p>';
        }
        ?>
    </div>
</div>