<?php
$sqlXemDonHang = "select * from tbl_chitietdonhang inner join tbl_sanpham on tbl_chitietdonhang.id_sanpham = tbl_sanpham.id_sanpham
and tbl_chitietdonhang.ma_thanhtoan = '$_GET[code]' order by tbl_chitietdonhang.id_chitietdonhang DESC";

$row = getRow($sqlXemDonHang);
?>

<div class="table-responsive-sm">
    <p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Xem đơn hàng</p>
    <!--<p>Liệt kê danh mục sản phẩm</p>-->
    <table border="1" style="border-collapse: collapse;" class="table">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>

        </tr>

        <?php
        $count = 0;
        $total = 0;

        foreach ($row as $item) {
            $total += $item['giasanpham'] * $item['soluongmua'];

            echo '<tr>
                <td>' . (++$count) . '</td>
<td>' . $item['ma_thanhtoan'] . '</td>
<td>' . $item['tensanpham'] . '</td>
<td>' . $item['soluongmua'] . '</td>
<td>' . number_format($item['giasanpham'], 0, ',', '.') . 'đ</td>
<td>' . number_format($item['soluongmua'] * $item['giasanpham'], 0, ',', '.') . 'đ</td>
</tr>';
        }
        ?>
        <tr>
            <td colspan="7">
                <span style="color: red;">Tổng tiền: <?php echo number_format($total, 0, ',', '.') ?>đ</span>
            </td>
        </tr>
    </table>
</div>
