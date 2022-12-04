<?php

//Nối hai bảng
$sqlLietKeSP = 'select * from tbl_sanpham inner join tbl_danhmuc
on tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc order by tbl_sanpham.id_sanpham desc';

$row = getRow($sqlLietKeSP);
?>

<div class="table-responsive-xl">
    <p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Liệt kê sản phẩm</p>
    <table border="1" style="border-collapse: collapse;" class="table">
        <tr>
            <th>ID</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Tóm tắt</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>

        </tr>

        <?php
        $count = 0;

        foreach ($row as $item) {
            echo '<tr>
            <td>' . (++$count) . '</td>
            <td>' . $item['masanpham'] . '</td>
            <td>' . $item['tensanpham'] . '</td>
            <td><img src="modules/quanlysanpham/uploads/' . $item['hinhanh'] . '" width="120px;"></td>
            <td>' . $item['giasanpham'] . '</td>
            <td>' . $item['soluong'] . '</td>
            <td>' . $item['tendanhmuc'] . '</td>
            <td>' . $item['tomtat'] . '</td>';

            if ($item['tinhtrang'] == 1) {
                echo '<td>Kích hoạt</td>';
            } else {
                echo '<td>Ẩn</td>';
            }

            echo ' <td><a href="modules/quanlysanpham/xuly.php?idsanpham=' . $item['id_sanpham'] . '"><button class="btn btn-danger
d-flex justify-content-center align-items-center">Xóa</button></a> <a
                    href="?action=quanlysp&query=sua&idsanpham=' . $item['id_sanpham'] . '">
                    <button class="btn btn-warning
d-flex justify-content-center align-items-center mt-2">Sửa</button>
                    </a></td>
    </tr>
    ';

        }
        ?>
    </table>
</div>