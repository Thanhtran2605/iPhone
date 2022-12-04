<?php
$sqlSuaDanhMucBaiViet = "select * from tbl_danhmucbaiviet where id_danhmucbaiviet = $_GET[idbaiviet] LIMIT 1";

$row = getRow($sqlSuaDanhMucBaiViet);
?>
<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Sửa danh mục bài viết</p>
<div class="table-responsive-md">
    <form action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']; ?>" method="POST">
        <table border="1" style="border-collapse: collapse;" class="table">
            <th>Tên danh mục bài viết</th>
            <th>Thứ tự</th>

            <?php
            foreach ($row as $item) {
                echo '  <tr>
                <td><input type="text" name="tendanhmucbaiviet" value="' . $item['tendanhmuc_baiviet'] . '"></td>
                <td><input type="text" value="' . $item['thutu'] . '" name="thutu"></td>
            </tr>';
            }
            ?>
            <tr>
                <td colspan="2"><input type="submit" name="suadanhmucbaiviet" value="Chỉnh sửa danh mục bài viết"></td>
            </tr>
        </table>
    </form>
</div>