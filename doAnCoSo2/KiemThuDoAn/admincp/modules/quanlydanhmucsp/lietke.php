<?php
$sqlLietKeDanhMucSP = "select * from tbl_danhmuc order by thutu desc";
//    CÁI NÀO THÊM SAU SẼ LÊN TRƯỚC

$row = getRow($sqlLietKeDanhMucSP);
?>

<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Liệt kê danh mục sản phẩm</p>
<div class="table-responsive-md">
    <table border="1" style="border-collapse: collapse;" class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục sản phẩm</th>
            <th>Quản lý</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 0;

        foreach ($row as $item) {
            echo '<tr>
                        <td>' . (++$count) . '</td>
                        <td>' . $item['tendanhmuc'] . '</td>
<td>
<div class="d-flex justify-content-center">
<a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=' . $item['id_danhmuc'] . '"><button class="btn btn-danger
d-flex justify-content-center align-items-center">Xóa</button></a> <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=' . $item['id_danhmuc'] . '">
<button class="btn btn-warning
d-flex justify-content-center align-items-center" style="margin-left: 15px;">Sửa</button></a></td>
</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
