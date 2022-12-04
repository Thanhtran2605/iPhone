<div class="table-responsive-sm">
    <p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Thêm sản phẩm</p>
    <form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
        <table border="1" style="border-collapse: collapse;" class="table">
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masanpham"></td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="tensanpham"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasanpham"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="soluong"></td>
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
                <td>Danh mục</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql = "select * from tbl_danhmuc order by id_danhmuc desc";
                        $row = getRow($sql);

                        foreach ($row as $item) {
                            echo '<option value="' . $item['id_danhmuc'] . '">' . $item['tendanhmuc'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
            </tr>
        </table>
    </form>
</div>
