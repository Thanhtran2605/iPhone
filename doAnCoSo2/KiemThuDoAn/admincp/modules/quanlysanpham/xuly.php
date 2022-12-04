<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_POST['themsanpham'])) {
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

    $hinhanh = $_FILES['file']['name'];
    $hinhanh_tmp = $_FILES['file']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;

    $sqlInsert = "insert into tbl_sanpham (tensanpham, masanpham, giasanpham, soluong, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc)
values ('$tensanpham', '$masanpham', '$giasanpham', '$soluong', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang', '$danhmuc')";
    connectionDB($sqlInsert);

    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

    header("Location: ../../index.php?action=quanlysp&query=them");
    exit();

} else if ($_POST['suasanpham']) {
    $id_sanpham = $_GET['idsanpham'];
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $giasanpham = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

    $hinhanh = $_FILES['file']['name'];
    $hinhanh_tmp = $_FILES['file']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;

    if (!empty($_FILES['file']['name'])) {
        move_uploaded_file($hinhanh_tmp, "uploads/" . $hinhanh);

        $sqlUpdate = "update tbl_sanpham set tensanpham='$tensanpham', masanpham='$masanpham', giasanpham='$giasanpham', soluong='$soluong', 
                       hinhanh='$hinhanh', tomtat ='$tomtat', noidung='$noidung', tinhtrang='$tinhtrang', id_danhmuc ='$danhmuc' where id_sanpham ='$id_sanpham'";

        $sql = "select * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]' LIMIT 1";
        $row = getRow($sql);

        foreach ($row as $item) {
            unlink("uploads/" . $item['hinhanh']);
        }

    } else {
        $sqlUpdate = "update tbl_sanpham set tensanpham='$tensanpham', masanpham='$masanpham', giasanpham='$giasanpham', soluong='$soluong', tomtat ='$tomtat', noidung='$noidung'
                     , tinhtrang='$tinhtrang', id_danhmuc ='$danhmuc' where id_sanpham ='$id_sanpham'";
    }

    connectionDB($sqlUpdate);

    header("Location: ../../index.php?action=quanlysp&query=them");
    exit();


} else {
    $sql = "select * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]'";
    $row = getRow($sql);

    foreach ($row as $item) {
        unlink("uploads/" . $item['hinhanh']);
    }

    $sqlDelete = "delete from tbl_sanpham where id_sanpham = $_GET[idsanpham]";
    connectionDB($sqlDelete);

    header("Location: ../../index.php?action=quanlysp&query=them");
    exit();
}
?>
