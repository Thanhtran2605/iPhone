<?php
//*******GET BÀI VIẾT*******//
$sqlBaiViet = "select * from tbl_baiviet where id_danhmucbaiviet = '$_GET[id]' order by id desc";
$news = getRow($sqlBaiViet);

//*******GET DANH MỤC BÀI VIẾT******//
$sqlDanhMucBaiViet = "select * from tbl_danhmucbaiviet where id_danhmucbaiviet = '$_GET[id]' LIMIT 1";
$row = getRow($sqlDanhMucBaiViet);

?>
<h3 class="section-title" style="margin-top: 35px;">Danh mục bài viết:<span
            style="text-align: center; text-transform: uppercase;">
    <?php
    foreach ($row as $item) {
        echo $item['tendanhmuc_baiviet'];
    }
    ?>
</span>
</h3>

<div class="maincontent-area">
    <div class="container">
        <div class="col-md-12">
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
    </div>
</div>