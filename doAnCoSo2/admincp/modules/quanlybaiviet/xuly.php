<?php
require_once("../../config/config.php");
require_once("../../config/database.php");

if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmucbaiviet = $_POST['danhmucbaiviet'];

    //Xử lý thêm hình ảnh vào
    $hinhanh = $_FILES['file']['name'];
    $hinhanh_tmp = $_FILES['file']['tmp_name'];
    $hinhanh = time() . $hinhanh;

    $sqlBaiViet = "insert into tbl_baiviet (tenbaiviet, tomtat, noidung, id_danhmucbaiviet, tinhtrang, hinhanh)
values ('$tenbaiviet', '$tomtat', '$noidung', '$danhmucbaiviet', '$tinhtrang', '$hinhanh')";

    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

    connectionDB($sqlBaiViet);

    header("Location: ../../index.php?action=quanlybaiviet&query=them");
    exit();

} else if (isset($_POST['suabaiviet'])) {
    $idbaiviet = $_GET['idbaiviet'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmucbaiviet = $_POST['danhmucbaiviet'];

    $hinhanh = $_FILES['file']['name'];
    $hinhanh_tmp = $_FILES['file']['tmp_name'];
    $hinhanh = time() . '_' . $hinhanh;

    if (!empty($_FILES['file']['name'])) {
//    MOVE TRƯỚC
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        $sqlBaiViet = "update tbl_baiviet set tenbaiviet = '$tenbaiviet', tomtat ='$tomtat', noidung = '$noidung', 
                       tomtat = '$tomtat', id_danhmucbaiviet = '$danhmucbaiviet', tinhtrang = '$tinhtrang', 
                       hinhanh = '$hinhanh' where id = '$idbaiviet'";
//    XÓA ẢNH TRƯỚC
        $sql = "select * from tbl_baiviet where id = '$idbaiviet' LIMIT 1";
        $row = getRow($sql);

        foreach ($row as $item) {
            unlink("uploads/" . $item['hinhanh']);
        }
    } else {
        $sqlBaiViet = "update tbl_baiviet set tenbaiviet = '$tenbaiviet', tomtat ='$tomtat', noidung = '$noidung', 
                       tomtat = '$tomtat', id_danhmucbaiviet = '$danhmucbaiviet', tinhtrang = '$tinhtrang' 
                       where id = '$idbaiviet'";
    }

    connectionDB($sqlBaiViet);
    header("Location: ../../index.php?action=quanlybaiviet&query=them");
    exit();
} else {
    $idbaiviet = $_GET['idbaiviet'];

    $sql = "select * from tbl_baiviet where id = '$idbaiviet'";
    $row = getRow($sql);

    foreach ($row as $item) {
        unlink("uploads/" . $item['hinhanh']);
    }

    $sqlDelete = "delete from tbl_baiviet where id = '$idbaiviet' LIMIT 1";
    connectionDB($sqlDelete);

    header("Location: ../../index.php?action=quanlybaiviet&query=them");
    exit();
}
?>