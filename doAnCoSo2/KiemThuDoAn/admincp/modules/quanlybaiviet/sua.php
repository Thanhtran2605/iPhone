<?php
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
$sql = "select * from tbl_baiviet where id = $_GET[idbaiviet] LIMIT 1";

$result = $conn->query($sql);
$row = $result->fetch_array();
?>
<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Chỉnh sửa bài viết</p>
<form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" method="POST"
      enctype="multipart/form-data">
    <table border="1" width="100%" style="border-collapse: collapse;">
        <tr>
            <td>Tên bài viết</td>
            <td><input type="text" name="tenbaiviet" value="<?php echo $row['tenbaiviet']; ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="file">
                <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="120px;">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $row['tomtat']; ?></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none;"><?php echo $row['noidung']; ?></textarea></td>
            <!--            Không được phép kéo-->
        </tr>
        <tr>
            <td>Danh mục bài viết</td>
            <td>
                <select name="danhmucbaiviet">
                    <?php
                    $sqlDanhMucBaiViet = "select * from tbl_danhmucbaiviet order by id_danhmucbaiviet desc";

                    $result = getRow($sqlDanhMucBaiViet);

                    foreach ($result as $item) {
                        if ($item['id_danhmucbaiviet'] == $row['id_danhmucbaiviet']) {
                            echo '<option value="' . $item['id_danhmucbaiviet'] . '" selected>' . $item['tendanhmuc_baiviet'] . '</option>';

                        } else {
                            echo '<option value="' . $item['id_danhmucbaiviet'] . '">' . $item['tendanhmuc_baiviet'] . '</option>';
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
            <td colspan="2"><input type="submit" name="suabaiviet" value="Chỉnh sửa bài viết"></td>
        </tr>
    </table>
</form>
