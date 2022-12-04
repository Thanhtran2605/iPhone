<?php
$sqlLietKeDanhMucBaiViet = "select * from tbl_danhmucbaiviet order by thutu desc";
//    CÁI NÀO THÊM SAU SẼ LÊN TRƯỚC

$row = getRow($sqlLietKeDanhMucBaiViet);
?>

<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Liệt kê danh mục bài viết</p>
<div class="table-responsive-md">
    <table border="1" style="border-collapse: collapse;" class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục bài viết</th>
            <th>Quản lý</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 0;

        foreach ($row as $item) {
            echo '<tr>
                        <td>' . (++$count) . '</td>
                        <td>' . $item['tendanhmuc_baiviet'] . '</td>
<td>
<div class="d-flex justify-content-center">
<a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=' . $item['id_danhmucbaiviet'] . '"><button class="btn btn-danger
d-flex justify-content-center align-items-center">Xóa</button></a> <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=' . $item['id_danhmucbaiviet'] . '">
<button class="btn btn-warning
d-flex justify-content-center align-items-center" style="margin-left: 15px;">Sửa</button></a></td>
</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
