<?php
if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}

if ($tam == 'danhmucsanpham') {
    include("main/danhmuc.php");

} else if ($tam == 'dangnhap') {
    include("main/dangnhap.php");

} else if ($tam == 'dangky') {
    include("main/dangky.php");

} else if ($tam == 'thaydoimatkhau') {
    include("main/thaydoimatkhau.php");

} else if ($tam == 'timkiem') {
    include("main/timkiem.php");

} else if ($tam == 'sanpham') {
    include("main/sanpham.php");

} else if ($tam == 'tintuc') {
    include("main/tintuc.php");

} else if ($tam == 'danhmucbaiviet') {
    include("main/danhmucbaiviet.php");

} else if ($tam == 'baiviet') {
    include("main/baiviet.php");

} else if ($tam == 'giohang') {
    include("main/giohang.php");

} else if ($tam == 'themgiohang') {
    include("main/themgiohang.php");

} else if ($tam == 'vanchuyen') {
    include("main/vanchuyen.php");

} else if ($tam == 'thanhtoandonhang') {
    include("main/thongtinthanhtoan.php");

} else if ($tam == 'camon') {
    include("main/camon.php");

} else if ($tam == 'donhangdamua') {
    include("main/donhangdadat.php");

} else if ($tam == 'xemdonhang') {
    include("main/xemdonhang.php");

} else if ($tam == 'donhangdadat') {
    include("main/chitietdonhangdadat.php");

} else if ($tam == 'danhgia') {
    include("main/danhgia.php");
} else {
    include("main/index.php");
}

?>


