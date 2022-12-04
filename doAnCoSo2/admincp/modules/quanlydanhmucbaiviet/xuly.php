<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_POST['themdanhmucbaiviet'])) {
    $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
    $thutu = $_POST['thutu'];

    $sqlInsert = "insert into tbl_danhmucbaiviet (tendanhmuc_baiviet, thutu) values ('$tendanhmucbaiviet', '$thutu')";

    connectionDB($sqlInsert);

    header("Location: ../../index.php?action=quanlydanhmucbaiviet&query=them");
    exit();

} else if (isset($_POST['suadanhmucbaiviet'])) {
    $id_danhmucbaiviet = $_GET['idbaiviet'];
    $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
    $thutu = $_POST['thutu'];

    $sqlUpdate = "update tbl_danhmucbaiviet set tendanhmuc_baiviet='$tendanhmucbaiviet', thutu ='$thutu' where id_danhmucbaiviet ='$id_danhmucbaiviet'";

    connectionDB($sqlUpdate);

    header("Location:../../index.php?action=quanlydanhmucbaiviet&query=them");
    exit();

} else {
    $id_danhmucbaiviet = $_GET['idbaiviet'];

    $sqlDelete = "delete from tbl_danhmucbaiviet where id_danhmucbaiviet = '$id_danhmucbaiviet'";
    connectionDB($sqlDelete);

    header("Location: ../../index.php?action=quanlydanhmucbaiviet&query=them");
    exit();
}
?>
