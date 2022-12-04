<?php
//Nối hai bảng
$sqlLietKeBaiViet = 'select * from tbl_baiviet inner join tbl_danhmucbaiviet
on tbl_baiviet.id_danhmucbaiviet = tbl_danhmucbaiviet.id_danhmucbaiviet order by tbl_baiviet.id desc';

$row = getRow($sqlLietKeBaiViet);
?>

<div class="table-responsive-md">
    <table border="1" style="border-collapse: collapse;" class="table">
        <p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Liệt kê danh mục bài
            viết</p>
        <tr>
            <th>ID</th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
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
                <td>' . $item['tenbaiviet'] . '</td>
                <td><img src="modules/quanlybaiviet/uploads/' . $item['hinhanh'] . '" width="120px;"></td>
                <td>' . $item['tendanhmuc_baiviet'] . '</td>
                <td>' . $item['tomtat'] . '</td>';

            if ($item['tinhtrang'] == 1) {
                echo '<td>Kích hoạt</td>';
            } else {
                echo '<td>Ẩn</td>';
            }

            echo ' <td><a href="modules/quanlybaiviet/xuly.php?idbaiviet=' . $item['id'] . '"><button class="btn btn-danger
d-flex justify-content-center align-items-center mt-2">Xóa</button></a> 
<a href="index.php?action=quanlybaiviet&query=sua&idbaiviet=' . $item['id'] . '">
                    <button class="btn btn-warning
d-flex justify-content-center align-items-center mt-2">Sửa</button></a></td></tr>';
        }
        ?>


    </table>
</div>

<div class="table-responsive-md">
    <table border="1" style="border-collapse: collapse;" class="table">
        <tr>
            <th>Nội dung</th>
        </tr>

        <?php
        echo '<tr>
            <td>' . $item['noidung'] . '</td>
            </tr>';
        ?>
    </table>
</div>

