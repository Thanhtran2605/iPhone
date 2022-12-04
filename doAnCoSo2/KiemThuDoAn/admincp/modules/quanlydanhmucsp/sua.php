<?php
$sqlSuaDanhMucSP = "select * from tbl_danhmuc where id_danhmuc = $_GET[iddanhmuc] LIMIT 1";

$row = getRow($sqlSuaDanhMucSP);
?>
<p style="text-transform: uppercase; font-weight: bold; text-decoration: underline">Sửa danh mục sản phẩm</p>
<div class="table-responsive-md">
    <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']; ?>" method="POST">
        <table border="1" style="border-collapse: collapse;" class="table">
            <th>Tên danh mục sản phẩm</th>
            <th>Thứ tự</th>

            <?php
            foreach ($row as $item) {
                echo '  <tr>
                <td><input type="text" name="tendanhmuc" value="' . $item['tendanhmuc'] . '"></td>
                <td><input type="text" value="' . $item['thutu'] . '" name="thutu"></td>
            </tr>';
            }
            ?>
            <tr>
                <td colspan="2"><input type="submit" name="suadanhmuc" value="Chỉnh sửa danh mục sản phẩm"></td>
            </tr>
        </table>
    </form>
</div>