<?php
//*****GET SẢN PHẨM SIDE BAR RANDOM*********//
$sqlSanPham = "select * from tbl_sanpham order by rand() LIMIT 5";
$result = getRow($sqlSanPham);


//*****GET DANH MỤC SẢN PHẨM SIDEBAR**********//
$sqlDanhMuc = "select * from tbl_danhmuc order by id_danhmuc desc";
$row = getRow($sqlDanhMuc);

if (isset($_SESSION['id_khachhang']) && isset($_SESSION['cart'])) {

    ?>

    <div class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            <div class="step current"><span><a href="index.php?quanly=giohang">Giỏ hàng</a></span></div>
            <div class="step "><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span></div>
            <div class="step "><span><a href="index.php?quanly=thanhtoandonhang">Thanh toán</a></span></div>
            <div class="step "><span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span></div>
        </div>
    </div>

    <?php
}
?>

<div class="maincontent-area">
    <div class="container">
        <?php
        if (isset($_SESSION['dangky'])) {
            echo '<p class="mt-5 mb-5 h3">Khách hàng: ' . '<span style="color: red;">' . $_SESSION['dangky'] . '</span></p>';
        }
        ?>
        <div class="row">
            <!--*******************SIDE BAR********************-->
            <div class="col-md-3">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Sản phẩm</h2>
                    <!--****************GET SẢN PHẨM IPHONE******************* RANDOM-->

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
                    <!--****************GET SẢN PHẨM IPHONE******************* RANDOM-->

                    <!--****************GET DANH MỤC SẢN PHẨM IPHONE*******************-->

                    <h2 class="sidebar-title">Danh mục sản phẩm</h2>
                    <?php
                    foreach ($row as $item) {
                        echo ' <p style="text-transform: uppercase;"><a href="index.php?quanly=danhmucsanpham&id=' . $item['id_danhmuc'] . '">' . $item['tendanhmuc'] . '</a></p>';
                    }
                    ?>

                    <!--****************GET DANH MỤC SẢN PHẨM IPHONE*******************-->

                </div>
            </div>

            <!--            *************************TABLE CART GIỎI HÀNG***************-->
            <div class="col-md-9">
                <table cellspacing="0" class="shop_table cart">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Quản lý</th>
                    </tr>
                    </thead>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = 0;
                        $thanhtien = 0;
                        $tongtien = 0;

                        foreach ($_SESSION['cart'] as $cart_item) {
                            $count++;
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                            $tongtien += $thanhtien;

                            echo '<tr class="cart_item">
                                           <td>' . $count . '</td>  
                                           <td>' . $cart_item['masanpham'] . '</td>
                                           <td>' . $cart_item['tensanpham'] . '</td>
                                           <td><img src="admincp/modules/quanlysanpham/uploads/' . $cart_item['hinhanh'] . '" width="110px;"></td> 
                                           <td><a href="pages/main/themgiohang.php?cong=' . $cart_item['id'] . '"><i class="fa-solid fa-plus"></i></a>
                                           ' . $cart_item['soluong'] . '
                                           <a href="pages/main/themgiohang.php?tru=' . $cart_item['id'] . '"><i class="fa-solid fa-minus"></i></a>
                                           </td>   
                                           <td>' . number_format($cart_item['giasanpham'], 0, ',', '.') . 'đ</td>
        <td>' . number_format($thanhtien, 0, ',', '.') . 'đ</td>
                                           <td><a href="pages/main/themgiohang.php?xoa=' . $cart_item['id'] . '"><button class="btn btn-warning">Xóa</button></a></td>
                                      </tr>';
                        }

                        echo '<tr>
                                <td colspan="7"><a href="index.php?quanly=vanchuyen" ></a></p></td>
                                <td><a href="pages/main/themgiohang.php?xoatatca=1"><button class="btn btn-danger">Xóa tất cả</button></a></td>
                              </tr>';

                        //                        <!--*************************TABLE TỔNG TIỀN GIỎI HÀNG********************-->

                        echo '<div class="cart_totals">
                    <table cellspacing="0" class="table table-bordered">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>Tổng tiền</th>
                            <td><span class="amount">' . number_format($tongtien, 0, ',', '.') . ' VNĐ </span></td>
                        </tr>
                        <tr class="cart-subtotal">
                            <th>Thành tiền</th>
                            <th><span class="amount">' . number_format($tongtien, 0, ',', '.') . ' VNĐ </span></th>
                        </tr>
                        </tbody>
                    </table>
                    </div>';

                        //                        <!--*************************TABLE TỔNG TIỀN GIỎI HÀNG********************-->

                        if (!isset($_SESSION['dangky'])) {
                            echo ' <tr><td colspan="8"><a href="index.php?quanly=dangky"  class="btn btn-danger" style="margin-left: 15px;">Đăng ký đặt hàng</a></td></tr>';
                        }

                    } else {
                        echo '<tr><td colspan = "8" style="text-align: center;" > Hiện tại giỏ hàng chưa có sản phẩm </td ></tr>';
                    }
                    ?>
                </table>
            </div>

            <!--            *************************TABLE CART GIỎI HÀNG***************-->
        </div>
    </div>
</div>
