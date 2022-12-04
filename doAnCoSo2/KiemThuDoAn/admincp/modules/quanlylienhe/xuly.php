<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_POST['thongtin'])) {
    $id = $_GET['id'];
    $thongtinlienhe = $_POST['thongtinlienhe'];
    $copyright = $_POST['copyright'];

    $sql = "update tbl_lienhe set thongtinlienhe = '$thongtinlienhe', copyright = '$copyright' where
                                                                           id = '$id'";

    connectionDB ($sql);

    header("Location:../../index.php?action=quanlylienhe&query=capnhat");
    exit();
}
?>
