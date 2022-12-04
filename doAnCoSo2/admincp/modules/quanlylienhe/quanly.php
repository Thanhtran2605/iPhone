<?php
$sqlLienHe = "select * from tbl_lienhe";

$row = getRow($sqlLienHe);
?>
<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Thông tin liên hệ</p>
<form method="POST" action="modules/quanlylienhe/xuly.php?id=<?php foreach ($row as $item) {
    echo $item['id'];
} ?>" enctype="multipart/form-data">
    <!--    ĐỂ GỬI FILE HÌNH ẢNH QUA FILE BẰNG ENCTYPE-->
    <!--    Action chỉ đường dẫn qua trang xử lý-->
    <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
            <td>Thông tin liên hệ</td>
            <td>
                <textarea rows="10" name="thongtinlienhe" style="resize: none;">
                    <?php
                    foreach ($row as $item) {
                        echo $item['thongtinlienhe'];
                    }
                    ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>Copyright</td>
            <td>
                <input type="text" name="copyright" class = "w-100" value="<?php
                foreach ($row as $item) {
                    echo $item['copyright'];
                }
                ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="thongtin" value="Cập nhật">
            </td>
        </tr>
    </table>
</form>