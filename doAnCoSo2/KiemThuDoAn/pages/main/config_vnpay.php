<?php
//LINK : https://sandbox.vnpayment.vn/apis/docs/huong-dan-tich-hop/

//LINK :  ADMIN QUẢN LÝ VÀ CÁC THÔNG TIN VNPAY: https://mail.google.com/mail/u/0/#search/vnpay/FMfcgzGqQvzslfMqvtLGSdkCCFhvTrQV

date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_TmnCode = "OTR0FZW1"; //Website ID in VNPAY System
$vnp_HashSecret = "JBOBKFPCPLVHKQTRVQTHPHPPXDRDRVUC"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

//Trả về trang cảm ơn nếu thành công cảm ơn
$vnp_Returnurl = "http://taoxanh.com/kiemThuDoAn/index.php?quanly=camon";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

//Config input format
//Expire
$startTime = date("YmdHis"); // bắt đầu
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime))); // hết hạn time hiện tại + 15 phút
?>