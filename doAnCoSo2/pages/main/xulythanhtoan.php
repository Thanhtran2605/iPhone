<?php
session_start();

require_once("../../admincp/config/config.php");
require_once("../../admincp/config/database.php");

//CONFIG VNPAY
require_once("config_vnpay.php");

//Mail
require_once("../../mail/sendmail.php");

$id_khachhang = $_SESSION['id_khachhang'];
$ma_thanhtoan = rand(0, 9999);

//Các hình thức thanh toán đều là name payment
$cart_payment = $_POST['payment'];

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$sql_getIdShipping = "select id_shipping from tbl_vanchuyen where id_dangky = '$id_khachhang'";
$result = $conn->query($sql_getIdShipping);
$row = $result->fetch_array();

$id_shipping = $row['id_shipping'];

//Thêm vào giỏ hàng
//So sánh cart_payment dựa trên value
if ($cart_payment == 'tienmat' || $cart_payment == 'chuyenkhoan') {
    $insert_cart = "insert into tbl_giohang(id_khachhang, ma_thanhtoan, trangthai, cart_payment, id_shipping) values ('$id_khachhang', '$ma_thanhtoan', 1, '$cart_payment', '$id_shipping')";

    $row = $conn->query($insert_cart);

    if ($row) {
        //        Thêm giỏi hàng chi tiết
        foreach ($_SESSION['cart'] as $item) {
            $id_sanpham = $item['id'];
            $soluong = $item['soluong'];

            $sql_themgiohangchitiet = "insert into tbl_chitietdonhang (ma_thanhtoan, id_sanpham, soluongmua) values ('$ma_thanhtoan', '$id_sanpham', '$soluong')";
            connectionDB($sql_themgiohangchitiet);
        }
    }

    //Email

    $tieude = "Order at website taoxanh.com successfully";
    $noidung = '<p style="color: #1bd172;">TÁO XANH</p>

    <p>Cảm ơn quý khách đã đặt hàng tại website Táo Xanh với mã đơn hàng là :' . $ma_thanhtoan . '</p>';
    $noidung .= '<h4>Đơn hàng đặt bao gồm : </h4>';

    foreach ($_SESSION['cart'] as $item) {
        $tongtien = 0;
        $tongtien += $item['soluong'] * $item['giasanpham'];

        $noidung .= '<ul style="margin: 10px;">
        <li>' . $item['tensanpham'] . '</li>
        <li>Mã sản phầm : ' . $item['masanpham'] . '</li>
        <li>Giá sản phẩm : ' . number_format($item['giasanpham'], 0, ',', '.') . 'đ</li>
        <li>Số lượng : ' . $item['soluong'] . '</li>
        <li>Tổng tiền  : ' . number_format($tongtien, 0, ',', '.') . 'đ </li>
        </ul>';

//        $maildathang = $_SESSION['email'];
//        $mail = new Mailer();
//        $mail->dathangmail($tieude, $noidung, $maildathang);
        unset($_SESSION['cart']);

        header("Location: ../../index.php?quanly=camon");
        exit();
    }
} else if ($cart_payment == 'vnpay') {
//    echo 'Thanh toán bằng VNPAY'; QUẢN TRỊ ADMIN VNPAY
    $vnp_TxnRef = $ma_thanhtoan; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại website'; //Nội dung thanh toán
    $vnp_OrderType = 'billpayment';

    //*************Tính tổng tiền :
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['giasanpham'] * $item['soluong'];
    }

    $vnp_Amount = $total * 100; // là 100 000
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB'; // ngân hàng demo là ncb
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
    $vnp_ExpireDate = $expire;

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $vnp_ExpireDate
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);

    if (isset($_POST['redirect'])) {
        $_SESSION['ma_thanhtoan'] = $ma_thanhtoan;

        $insert_cart = "insert into tbl_giohang (id_khachhang, ma_thanhtoan, trangthai, cart_payment, id_shipping) values ('$id_khachhang', '$ma_thanhtoan', 1, '$cart_payment', '$id_shipping')";
        $row = $conn->query($insert_cart);

        if ($row) {
            //        Thêm giỏi hàng chi tiết
            foreach ($_SESSION['cart'] as $item) {
                $id_sanpham = $item['id'];
                $soluong = $item['soluong'];

                $sql_themgiohangchitiet = "insert into tbl_chitietdonhang (ma_thanhtoan, id_sanpham, soluongmua) values ('$ma_thanhtoan', '$id_sanpham', '$soluong')";
                connectionDB($sql_themgiohangchitiet);
            }
        }

        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }


}


?>
