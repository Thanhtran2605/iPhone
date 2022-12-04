<?php
$sql = "select * from tbl_giohang inner join tbl_dangky on tbl_giohang.id_khachhang = tbl_dangky.id_dangky";
$row = getRow($sql);

?>
<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Liệt kê đơn hàng</p>
<div class="table-responsive-xl ">
    <table border="1" width="50%" style="border-collapse: collapse;" class="table">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Tình trạng</th>
            <th>Quản lý</th>
            <th>In đơn hàng</th>

        </tr>
        <?php
        $count = 0;

        foreach ($row as $item) {
            echo '<tr>
                <td>' . (++$count) . '</td>
                <td>' . $item['ma_thanhtoan'] . '</td>
                <td>' . $item['tenkhachhang'] . '</td>
                <td>' . $item['diachi'] . '</td>
                <td>' . $item['email'] . '</td>
                <td>' . $item['sodienthoai'] . '</td>';

            if ($item['trangthai'] == 1) {
                echo '<td><a href="modules/quanlydonhang/xuly.php?&code=' . $item['ma_thanhtoan'] . '">
                    <button class=" btn btn-outline-info
d-flex justify-content-center align-items-center">Đơn hàng mới</button></a></td>';
            } else {
                echo '<td><a>
                    <button class=" btn btn-outline-info
d-flex justify-content-center align-items-center">Đã xem</button></a></td>';
            }

            echo '<td><a href="index.php?action=quanlydonhang&query=xemdonhang&code=' . $item['ma_thanhtoan'] . '">
<button class="btn btn-info
d-flex justify-content-center align-items-center">Xem đơn hàng</button></a></td>';

            echo '<td><a href="modules/quanlydonhang/indonhang.php?code=' . $item['ma_thanhtoan'] . '">
<button class="btn btn-primary
d-flex justify-content-center align-items-center">In đơn hàng</button></a></td>';
        }

        //        Đoạn code if có nghĩa là hiện tình trạng là đơn hàng mới default là 1. Xong đó qua xử lý gắn bằng 0. Là khi click vào thì
        // đã xem thông tin đó rùi rồi ròi;
        ?>
    </table>
</div>
