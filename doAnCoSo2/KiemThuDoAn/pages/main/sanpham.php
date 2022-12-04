<?php
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

//*******GET SẢN PHẨM CHI TIẾT********//
$sqlDetails = "select * from tbl_sanpham inner join tbl_danhmuc on tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
                   and tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
$row = getRow($sqlDetails);

//**********GET CÁC FETCH ARRAY CỦA SẢN PHẨM CHI TIẾT NỘI DUNG, THÔNG SỐ, HÌNH ẢNH
$result = $conn->query($sqlDetails);
$field = $result->fetch_array();

?>

<h2 class="section-title" style="margin-top: 50px;">CHI TIẾT SẢN PHẨM</h2>

<!--****************GET SẢN PHẨM IPHONE*******************-->

<div class="maincontent-area">
    <div class="container d-flex">
        <div class="row">
            <!--                        SẢN PHẨM MỘT-->
            <?php
            foreach ($row as $item) {
                echo '<form action="pages/main/themgiohang.php?idsanpham=' . $item['id_sanpham'] . '" method="POST">
            <div class="col-md-3">
                <div class="latest-product" >
                        <div class="single-product" >
        
                                         <div class="product-f-image" >
                                            <img src = "admincp/modules/quanlysanpham/uploads/' . $item['hinhanh'] . '">
                                                <div class="product-hover" >
                                                <a href="pages/main/themgiohang.php?idsanpham=' . $item['id_sanpham'] . '" class="add-to-cart-link">
                                                     <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                                                </a>
                                                </div>
                                         </div>
                                        <h2 ><span class="title_product" > Mã sản phẩm : ' . $item['masanpham'] . ' </span></h2 >
                                        <h2 ><a class="title_product" style="text-decoration: none;" > Tên sản phẩm: ' . $item['tensanpham'] . ' </a ></h2 >
                                        <div class="product-carousel-price">
                                        <p class="price_product"><ins> Giá: ' . number_format($item['giasanpham'], 0, ',', '.') . ' VNĐ</ins >
                                       
                                        </div >
                                        <br ><del > ' . number_format($item['giasanpham'] + 100000, 0, ',', '.') . ' VNĐ </del ></p >
                                        <h2 ><span class="title_product" > Số lượng : ' . $item['soluong'] . ' </span></h2 >
                                        <h2 ><span class="title_product" > Danh mục : ' . $item['tendanhmuc'] . ' </span></h2 >
                                        <p><input class="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
                                         </div>
                        </div>
                </div>';
            }
            ?>
            <!--****************GET SẢN PHẨM IPHONE*******************-->

            <!--/**************SỬ DỤNG TABS CODE TRÊN INTERNET*****************/-->
            <div class="col-md-9">
                <div class="tabs">
                    <ul id="tabs-nav">
                        <li><a href="#tab1">Thông số kỹ thuật</a></li>
                        <li><a href="#tab2">Nội dung chi tiết</a></li>
                        <li><a href="#tab3">Hình ảnh</a></li>
                    </ul> <!-- END tabs-nav -->
                    <div id="tabs-content">
                        <div id="tab1" class="tab-content">
                            <?php
                            echo $field['tomtat'];
                            ?>
                        </div>
                        <div id="tab2" class="tab-content">
                            <?php
                            echo $field['noidung'];
                            ?>
                        </div>
                        <div id="tab3" class="tab-content">
                            <?php
                            echo '<img src="admincp/modules/quanlysanpham/uploads/' . $field['hinhanh'] . '" width="60%">';
                            ?>
                        </div>
                    </div> <!-- END tabs-content -->
                </div>
            </div>
        </div>
    </div>
</div>
