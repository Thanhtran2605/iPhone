<?php
$sqlChiTietDonHang = "select * from tbl_chitietdonhang inner join tbl_sanpham where tbl_chitietdonhang.id_sanpham
= tbl_sanpham.id_sanpham and tbl_chitietdonhang.ma_thanhtoan = '$_GET[code]' order by tbl_chitietdonhang.id_chitietdonhang desc";

$row = getRow($sqlChiTietDonHang);
?>

<h4 class="section-title" style="margin-top: 28px;">Xem đơn hàng</h4>

<style>
    th {
        background-color: #ee5057;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive-sm">
                <!--<p>Liệt kê danh mục sản phẩm</p>-->
                <table border="1" style="border-collapse: collapse;" class="table table-danger">
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
                        $count++;
                        $total += $item['soluong'] * $item['giasanpham'];
                        echo '<tr>
                        <td>' . $count . '</td>
                        <td>' . $item['ma_thanhtoan'] . '</td>
                        <td>' . $item['tensanpham'] . '</td>
                        <td>' . $item['soluongmua'] . '</td>
                        <td>' . number_format($item['giasanpham'], 0, ',', '.') . 'đ</td>
                        <td>' . number_format($item['soluong'] * $item['giasanpham'], 0, ',', '.') . 'đ</td>
                        ';
                    }
                    ?>

                    <tr>
                        <td colspan="7">
                            <p style="color: red; text-align: center;">Tổng
                                tiền: <?php echo number_format($total, 0, ',', '.') ?>đ</p>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
