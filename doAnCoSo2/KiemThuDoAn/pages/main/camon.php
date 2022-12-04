<?php
require_once("admincp/config/config.php");
require_once("admincp/config/database.php");

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];

    $ma_thanhtoan = $_SESSION['ma_thanhtoan'];

    //        INSERT VALUE INTO DATABASE
    $sql = "insert into tbl_vnpay(ma_thanhtoan, soluong, ma_nganhang, banktranno, loaithe, thongtindathang, ngaythanhtoan, tmncode, ma_giaodich)
values ('$ma_thanhtoan', '$vnp_Amount', '$vnp_BankCode', '$vnp_BankTranNo', '$vnp_CardType', '$vnp_OrderInfo', '$vnp_PayDate', '$vnp_TmnCode', '$vnp_TransactionNo')";

    $result = $conn->query($sql);

    if ($result) {
        echo '<h3 style="text-align: center;">Giao dịch thanh toán bằng VNPAY thành công</h3>';
        echo '<p style="text-align: center;">Vui lòng vào trang <a target="_blank" href="#">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn</p>';

        unset($_SESSION['cart']);
    } else {
        echo 'Giao dịch VNPAY thất bại';
    }

}
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="img/logotaodo2.png" alt="">
            <p style="color: green; font-size: 18px;">Táo Đỏ cảm ơn bạn đã mua hàng Website sẽ liên hệ bạn sớm nhất.</p>
            <a href="index.php?quanly=danhgia"><p style="color: green; font-size: 18px;">Hãy để lại bình luận cho chúng tôi.</p></a>
        </div>
    </div>
</div>
