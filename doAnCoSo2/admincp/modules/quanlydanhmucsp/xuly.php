<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_POST['themdanhmuc'])) {
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    $sqlInsert = "insert into tbl_danhmuc (tendanhmuc, thutu) values ('$tenloaisp', '$thutu')";
    connectionDB($sqlInsert);

    header("Location: ../../index.php?action=quanlydanhmucsanpham&query=them");
    exit();

} else if (isset($_POST['suadanhmuc'])) {
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    $sqlModify = "update tbl_danhmuc set tendanhmuc = '$tenloaisp', thutu = '$thutu'";
    connectionDB($sqlModify);

    header("Location: ../../index.php?action=quanlydanhmucsanpham&query=them");
    exit();

} else {
    $sqlDelete = "delete from tbl_danhmuc where id_danhmuc = '$_GET[iddanhmuc]'";
    connectionDB($sqlDelete);

    header("Location: ../../index.php?action=quanlydanhmucsanpham&query=them");
    exit();
}
?>