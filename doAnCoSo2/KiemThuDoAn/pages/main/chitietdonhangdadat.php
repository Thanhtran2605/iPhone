<?php
    if (isset($_SESSION['cart']) && isset($_SESSION['id_khachhang'])) {

?>

<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step done"><span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span></div>
        <div class="step done"><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span></div>
        <div class="step done"><span><a href="index.php?quanly=thanhtoandonhang">Thanh toán</a><span></div>
        <div class="step current"><span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span></div>
    </div>

    <?php } ?>


<?php
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$id_khachhang = $_SESSION['id_khachhang'];
$sqlLietKeDonHang = "select * from tbl_giohang inner join tbl_dangky on tbl_giohang.id_khachhang = tbl_dangky.id_dangky
and tbl_giohang.id_khachhang = '$id_khachhang'";

$row = getRow($sqlLietKeDonHang);
?>

<h4 class="section-title" style="margin-top: 28px;">Lịch sử đơn hàng</h4>

<style>
    th {
        background-color: #ee5057;
        color: white;
    }
</style>
    <div class="table-responsive-xl">
        <table border="1" style="border-collapse: collapse;" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Xem đơn hàng</th>
                <th>Hình thức thanh toán</th>

            </tr>

            </thead>
            <?php

            if (count($row) > 0) {
                $count = 0;

                foreach ($row as $item) {
                    $count++;

                    echo '<tr>
                        <td>' . $count . '</td>
                        <td>' . $item['ma_thanhtoan'] . '</td>
                        <td>' . $item['tenkhachhang'] . '</td>
                        <td>' . $item['diachi'] . '</td>
                        <td>' . $item['email'] . '</td>
                        <td>' . $item['sodienthoai'] . '</td>';

                    echo '<td><a href="index.php?quanly=xemdonhang&code=' . $item['ma_thanhtoan'] . '">Xem đơn hàng</a></td>';

                    //        IN RA PHƯƠNG THỨC THANH TOÁN
                    if ($item['cart_payment'] == 'vnpay' || $item['cart_payment'] == 'MOMO') {
                        echo '<td>' . $item['cart_payment'] . '</td>';
                    } else {
                        echo '<td>' . $item['cart_payment'] . '</td>';
                    }
                }
            } else {
                echo '<td colspan="9" style="color: red; text-align: center;">Bạn chưa có đơn hàng nào.</td>';
            }
            ?>
        </table>
    </div>
</div>
