<div class="clear"></div>
<div id="main">
    <div class="main_content">
        <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $tam = $_GET['action'];
            $query = $_GET['query'];
        } else {
            $tam = '';
            $query = '';
        }

        if ($tam == 'quanlydanhmucbaiviet' && $query == 'them') {
            include("modules/quanlydanhmucbaiviet/them.php");
            include("modules/quanlydanhmucbaiviet/lietke.php");

        } else if ($tam == 'quanlydanhmucbaiviet' && $query == 'sua') {
            include("modules/quanlydanhmucbaiviet/sua.php");

        } else if ($tam == 'quanlylienhe' && $query == 'capnhat') {
            include("modules/quanlylienhe/quanly.php");

        } else if ($tam == 'quanlybaiviet' && $query == 'them') {
            include("modules/quanlybaiviet/them.php");
            include("modules/quanlybaiviet/lietke.php");

        } else if ($tam == 'quanlybaiviet' && $query == 'sua') {
            include("modules/quanlybaiviet/sua.php");

        } else if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");

        } else if ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
            include("modules/quanlydanhmucsp/sua.php");

        } else if ($tam == 'quanlysp' && $query == 'them') {
            include("modules/quanlysanpham/them.php");
            include("modules/quanlysanpham/lietke.php");

        } else if ($tam == 'quanlysp' && $query == 'sua') {
            include("modules/quanlysanpham/sua.php");

        } else if ($tam == 'quanlydonhang' && $query == 'lietke') {
            include("modules/quanlydonhang/lietke.php");

        } else if ($tam == 'quanlydonhang' && $query == 'xemdonhang') {
            include("modules/quanlydonhang/xemdonhang.php");

        } else {
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");

        }

        ?>
    </div>
</div>