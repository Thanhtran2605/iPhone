<?php
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$sqlModify = "select * from tbl_sanpham where id_sanpham = '$_GET[idsanpham]' LIMIT 1";

$result = $conn->query($sqlModify);
$row = $result->fetch_array();

?>
<div class="table-responsive-sm">
    <p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Chỉnh sửa sản phẩm</p>
    <form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']; ?>"
          enctype="multipart/form-data">
        <table border="1" style="border-collapse: collapse;" class="table">
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masanpham" value="<?php echo $row['masanpham']; ?>"></td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="tensanpham" value="<?php echo $row['tensanpham']; ?>"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasanpham" value="<?php echo $row['giasanpham']; ?>"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="soluong" value="<?php echo $row['soluong']; ?>"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="file">
                    <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh']; ?>" width="120px;">
                </td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $row['tomtat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea rows="10" name="noidung" style="resize: none;"><?php echo $row['noidung']; ?></textarea>
                </td>
                <!--            Không được phép kéo-->
            </tr>
            <tr>
                <td>Danh mục</td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $sql = "select * from tbl_danhmuc order by id_danhmuc desc";
                        $result = getRow($sql);

                        foreach ($result as $item) {

                            if ($item['id_danhmuc'] == $row['id_danhmuc']) {
                                echo '<option value="' . $item['id_danhmuc'] . '" selected>' . $item['tendanhmuc'] . '</option>';
                            } else {
                                echo '<option value="' . $item['id_danhmuc'] . '">' . $item['tendanhmuc'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <?php
                        if ($row['tinhtrang'] == 1) {
                            echo '<option value="1">Kích hoạt</option>
                                      <option value="0">Ẩn</option>';

                        } else {
                            echo '<option value="1">Kích hoạt</option>
                                      <option value="0">Ẩn</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="Chỉnh sửa sản phẩm"></td>
            </tr>
        </table>
    </form>
</div>

