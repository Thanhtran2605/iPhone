<?php
$sqlBaiViet = "select * from tbl_baiviet where tbl_baiviet.id = '$_GET[id]' LIMIT 1";
$row = getRow ($sqlBaiViet);


?>

<div class="maincontent-area">
    <div class="container">
        <div class="col-md-12">
            <h3 class="section-title">Bài viết:<span style="text-align: center; text-transform: uppercase;">
                    <?php
                        foreach ($row as $item) {
                            echo $item['tenbaiviet'];
                        }
                    ?>
                </span>
            </h3>
            <?php
            foreach ($row as $item) {
                echo '
            <h3>Tên bài viết : ' . $item['tenbaiviet'] . '</h3>
            <img src="admincp/modules/quanlybaiviet/uploads/' . $item['hinhanh'] . '" width="20%;" class="img-thumbnail">    
           <p style="text-align: center; margin: 10px;"class="title_product">' . $item['tomtat'] . '</p>
           <p style="margin: 10px;"class="title_product">' . $item['noidung'] . '</p>';
            }
            ?>
        </div>
    </div>
</div>



