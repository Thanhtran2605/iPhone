<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Thêm bài viết</p>
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
            <td>Tên bài viết</td>
            <td><input type="text" name="tenbaiviet"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none;"></textarea></td>
            <!--            Không được phép kéo-->
        </tr>
        <tr>
            <td>Danh mục bài viết</td>
            <td>
                <select name="danhmucbaiviet">
                    <?php
                    $sqlDanhMucBaiViet = "select * from tbl_danhmucbaiviet order by id_danhmucbaiviet desc";

                    $row = getRow($sqlDanhMucBaiViet);

                    foreach ($row as $item) {
                        echo '<option value="' . $item['id_danhmucbaiviet'] . '">' . $item['tendanhmuc_baiviet'] . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="0">Kích hoạt</option>
                    <option value="1">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="thembaiviet" value="Thêm bài viết"></td>
        </tr>
    </table>
</form>
