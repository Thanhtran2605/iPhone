<?php
if (isset($_SESSION['id_khachhang'])) {
    ?>
    <!-- Link Swiper's CSS -->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <div class="wrapper">
        <div class="title">
            ĐÁNH GIÁ CỦA KHÁCH HÀNG
        </div>
        <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
            <div class="form">
                <div class="inputfield">
                    <label>Họ và tên khách hàng</label>
                    <input type="text" name="name" class="input" required/>
                </div>
                <div class="inputfield">
                    <label>Email</label>
                    <input type="email" name="email" class="input" required/>
                </div>
                <div class="inputfield">
                    <label>Tiêu đề</label>
                    <input type="text" name="header" class="input" required/>
                </div>
                <div class="inputfield">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="product" class="input" required/>
                </div>
                <div class="inputfield">
                    <label>Hình ảnh</label>
                    <input type="file" name="hinhanh" class="input" required/>
                </div>
                <div class="inputfield">
                    <label>Nội dung</label>
                    <td><textarea rows="10" name="noidung" style="resize: none;"></textarea></td>
                </div>
                <div class="inputfield">
                    <input type="submit" name="danhgia" value="Gửi" class="btn">
                </div>
            </div>
        </form>
    </div>

    <?php
}
?>

<style>
    .wrapper {
        max-width: 635px;
        width: 100%;
    }

    table th, td {
        text-align: center;
    }
</style>


<!--    JQUERY CDN FOR TRÌNH SOẠN THẢO-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('noidung');
</script>
<!--    JQUERY CDN FOR TRÌNH SOẠN THẢO-->


<!--***********Thêm đánh giá của khách hàng vào cơ sở dữ liệu**********-->

<?php
if (isset($_POST['danhgia'])) {
    $tieude = $_POST['header'];
    $noidung = $_POST['noidung'];

    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;

    $id_dangky = $_SESSION['id_khachhang'];
    $tensanpham = $_POST['product'];
    $tenkhachhang = $_POST['name'];

    $sqlInsert = "insert into tbl_danhgia (tieude, hinhanh, noidung, tensanpham, tenkhachhang, id_dangky) values ('$tieude', '$hinhanh', '$noidung', '$tensanpham', '$tenkhachhang', '$id_dangky')";

    connectionDB($sqlInsert);

    move_uploaded_file($hinhanh_tmp, "pages/main/uploads/" . $hinhanh);

    header("Location: index.php?quanly=camon");
    exit();
}

?>

<!--***********Thêm đánh giá của khách hàng vào cơ sở dữ liệu**********-->

<!--***********Hiển thị slide đánh giá của khách hàng*****************-->
<div class="container">
    <div class="row">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $sql = "select * from tbl_danhgia order by id_danhgia desc";
                $row = getRow($sql);

                foreach ($row as $item) {
                    echo '<div class="swiper-slide">
                    <div class="table-responsive-xl">
                <table border="1" style="border-collapse: collapse;" class="table">
                <thead>
                <tr><th colspan="4" style="color: #878680;">ĐÁNH GIÁ CỦA KHÁCH HÀNG</th></tr>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                </tr>
                </thead>
                <tbody>
                            <tr>
                                <td><i class="fa-solid fa-user" style="color: green; font-size: 18px; margin-right: 11px;"></i>' . $item['tenkhachhang'] . '</td>
                                <td>' . $item['tensanpham'] . '</td>
                                <td><img src="pages/main/uploads/' . $item['hinhanh'] . '" width="120px;"></td>
                                <td>' . $item['noidung'] . '</td>
                            </tr>                  
                </tbody>
            </table>
        </div>
      </div>';
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>


<!--***********Hiển thị slide đánh giá của khách hàng*****************-->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!--Link Swiper JS đã sử dụng-->
<!--https://codesandbox.io/s/p2cf14?file=/index.html-->

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

