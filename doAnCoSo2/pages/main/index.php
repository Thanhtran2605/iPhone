<?php
//*****GET SLIDER********//
$sqlSlider = "select * from tbl_sanpham inner join tbl_danhmuc on tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
order by tbl_sanpham.id_sanpham desc LIMIT 1, 4";
$row = getRow($sqlSlider);

//******GET PHAN TRANG*****//
if (isset($_GET['trang'])) {
    $pageGet = $_GET['trang'];
} else {
    $pageGet = 1;
}

if ($pageGet == '' || $pageGet == 1) {
    $begin = 0;
} else {
    $begin = ($pageGet * 8) - 8;
}


//******GET SAN PHAM LAY TRANG DAU TIEN LA 8 SAN PHAM,******//
$sqlProduct = "select * from tbl_sanpham inner join tbl_danhmuc on tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
order by tbl_sanpham.id_sanpham desc LIMIT $begin, 8";
$result = getRow($sqlProduct);

//******GET SAN PHAM RANDOM UU DAI,*********//
$sqlPromo = "select * from tbl_sanpham order by rand() LIMIT 9";
$outCome = getRow ($sqlPromo);

?>
<!--*************************GET SLIDER*******************-->

<div class="row">
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul id="bxslider-home4">
                <?php
                foreach ($row as $item) {
                    echo '<li class="d-flex justify-content-evenly">
                            <img src="admincp/modules/quanlysanpham/uploads/' . $item['hinhanh'] . '">
                            <div class="caption-group">
                                <h2 class="caption title" > ' . $item['tensanpham'] . '<span
                                style="color: #ee5057;""> Táo <strong> Đỏ </strong></span></h2 >
                                <h4 class="caption subtitle">Chính hãng</h4>
                                <a class="caption button-radius" href="index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '"><span class="icon"></span>Chi tiết</a>
                            </div>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<!--*************************GET SLIDER*******************-->


<!--*******************GET 4 ********************-->
<div class="promo-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!--*******************GET 4 ********************-->

<!--****************GET SẢN PHẨM IPHONE*******************-->
<div class="maincontent-area">
    <div class="container">
        <div class="row">
                <h2 class="section-title">SẢN PHẨM</h2>
                <!--SẢN PHẨM MỘT-->
                <?php
                foreach ($result as $item) {
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

        <!--****************GET SẢN PHẨM IPHONE*******************-->

        <!-- *****************   PHÂN TRANG****************-->
        <?php
        $sql_page = "select * from tbl_sanpham";
        $conn = new mysqli (HOST, USERNAME, PASSWORD, DATABASE);
        $row = $conn->query($sql_page);
        $row_count = $row->num_rows;
        $page = ceil($row_count / 8);
        //            CELL hàm làm tròn lên mấy sản phẩm thì chia đúng số đó
        ?>

        <p style="text-align: center; margin: 35px 0;">Trang hiện tại : <?php echo $pageGet; ?>/<?php echo $page; ?></p>

        <ul class="list-page">
            <?php
            for ($i = 1;
                 $i <= $page;
                 $i++) {
                ?>
                <li><a target="_self" href="index.php?trang=<?php echo $i; ?> "
                        <?php if ($i == $pageGet) {
                            echo 'style="color:white; background-color: #268051; padding: 15px; margin: 0 15px;
                            border-radius: 5px;"';
                        } else {
                            echo '';
                        } ?>><?php echo $i; ?></a></li>
                <!--                            $i = 1 bắt đầu chạy từ trang 1-->
            <?php } ?>
        </ul>

    </div>
</div>
<!-- *****************   PHÂN TRANG****************-->

<!--**************************GET SẢN PHẨM IPHONE RANDOM********************-->
<div class="product-widget-area">
    <div class="container">
        <div class="row">
            <h2 class="product-wid-title">Sản phẩm siêu ưu đãi</h2>
            <?php
                foreach ($outCome as $item) {
                    echo '<div class="col-md-4">
                <div class="single-product-widget">          
                    <div class="single-wid-product">
                        <a href = "index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '">
                            <img src = "admincp/modules/quanlysanpham/uploads/' . $item['hinhanh'] . '" class="recent-thumb">
                        <h2><a href="index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '">' . $item['tensanpham'] . '</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins> Giá: ' . number_format($item['giasanpham'], 0, ',', '.') . ' VNĐ </ins >
                            <del>Giá: ' . number_format($item['giasanpham'] + 100000, 0, ',', '.') . ' VNĐ</del>
                        </div>
                        </a>
                    </div>
                </div>
            </div>';
                }
            ?>
        </div>
    </div>
</div>

<!--**************************GET SẢN PHẨM IPHONE RANDOM********************-->