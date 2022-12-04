<?php
//******GET DANH MỤC BÀI VIẾT*******//
$sqlDanhMucBaiViet = "select * from tbl_danhmucbaiviet order by tbl_danhmucbaiviet.id_danhmucbaiviet desc";
$row = getRow($sqlDanhMucBaiViet);


//*****GET SẢN PHẨM RANDOM*********//
$sqlSanPham = "select * from tbl_sanpham order by rand() LIMIT 5";
$result = getRow($sqlSanPham);

//******GET TÓM TẮT BÀI VIẾT**************//
$sqlBaiViet = "select * from tbl_baiviet where tinhtrang = 1 order by id desc";
$news = getRow($sqlBaiViet);

?>

<div class="maincontent-area">
    <div class="container">
            <div class="col-md-3">
                <div class="single-sidebar">
                    <!--*************************SIDEBAR DANH MỤC BÀI VIẾT***********************-->

                    <h2 class="sidebar-title">Danh mục bài viết</h2>
                    <?php
                    foreach ($row as $item) {
                        echo '<div class="thubmnail-recent"><a  style="text-transform: uppercase;" href="index.php?quanly=danhmucbaiviet&id=' . $item['id_danhmucbaiviet'] . '">' . $item['tendanhmuc_baiviet'] . '</a></div>';
                    }
                    ?>

                    <!--*************************SIDEBAR DANH MỤC BÀI VIẾT***********************-->

                    <!--*************************SIDEBAR SẢN PHẨM RANDOM***********************-->
                    <h2 class="sidebar-title">Sản phẩm</h2>
                    <?php
                    foreach ($result as $item) {
                        echo '<div class="thubmnail-recent">
            <a href = "index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '">
           <img src = "admincp/modules/quanlysanpham/uploads/' . $item['hinhanh'] . '" class="recent-thumb">
            <h2><a href="index.php?quanly=sanpham&id=' . $item['id_sanpham'] . '">' . $item['tensanpham'] . '</a></h2>
            <div class="product-sidebar-price">
            <ins> Giá: ' . number_format($item['giasanpham'], 0, ',', '.') . ' VNĐ </ins >
                <br><del>Giá: ' . number_format($item['giasanpham'] + 100000, 0, ',', '.') . ' VNĐ</del>
            </div>
            </a>
            </a>
            </div>';
                    }
                    ?>

                    <!--*************************SIDEBAR SẢN PHẨM RANDOM***********************-->
                </div>
            </div>

            <!--*************************BÀI VIẾT***********************-->
            <div class="col-md-9">
                <?php
                foreach ($news as $item) {
                    echo '<div class="col-md-6">
                <a href="index.php?quanly=baiviet&id=' . $item['id'] . '">
                                <img src="admincp/modules/quanlybaiviet/uploads/' . $item['hinhanh'] . '">
                                <h4><p class="title_product" style="margin-top: 15px;">Tên bài viết : ' . $item['tenbaiviet'] . '</p></h4>
                                
                      </a>
                      <p style="text-align: center; margin: 10px;" class="title_product">' . $item['tomtat'] . '</p></div>';
                }
                ?>
            </div>


            <!--*************************BÀI VIẾT***********************-->
    </div>
</div>


