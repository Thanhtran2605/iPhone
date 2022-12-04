<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $sql = "update tbl_giohang set trangthai = 0 where ma_thanhtoan = '$code'";
    connectionDB($sql);

    header("Location: ../../index.php?action=quanlydonhang&query=lietke");
    exit();
}
?>