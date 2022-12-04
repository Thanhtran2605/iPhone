<?php
//    ****************ĐỂ TRÁNH GÕ LINK LÀ VẪN VÀO ĐƯỢC MÀ KHÔNG CẦN ĐĂNG NHẬP
session_start();

if (!isset($_SESSION['dangnhap'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý Táo Đỏ</title>
    <link rel="icon" href="../img/taodopng.jpg" type="image/png">

    <!--    LINK FONT ICON-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!--    LINK CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h3 class="text-center mt-5" style="text-transform: uppercase; font-size: 28px;">Chào mừng đến với quản trị <span
            class="primary"> Táo <strong style="font-size: 28px;"> Đỏ </strong></span></h3>

<?php
require_once("config/config.php");
require_once("config/database.php");
include ("modules/header.php");
include("modules/dashboard.php");
echo '<div class="container">';
require_once ("modules/main.php");
echo '</div>';

include ("modules/footer.php");
?>

<!--    JQUERY CDN FOR TRÌNH SOẠN THẢO-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('tomtat');
    CKEDITOR.replace('noidung');
    CKEDITOR.replace('thongtinlienhe');
</script>

</body>
</html>

<style>
    .primary {
        color: #bf0404;
        font-size: 28px;
    }
</style>