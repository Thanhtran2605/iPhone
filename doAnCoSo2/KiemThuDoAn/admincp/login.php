<?php
session_start();
require_once("config/config.php");
require_once("config/database.php");

if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);

    $sql = "select * from tbl_admin where username ='$taikhoan' and password ='$matkhau' LIMIT 1";
    $row = getRow($sql);
    if (count($row) > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location: index.php");
        exit();
    } else {
//        echo '<p style="">Tài khoản và mật khẩu không hợp lệ. Vui lòng nhập lại!</p>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Táo Đỏ</title>
    <link rel="icon" href="../img/taodopng.jpg" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!--    LINK CSS -->
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="login-form">
    <form action="" method="POST" autocomplete="off">
        <div class="text-center">
            <a href="login.php">
                <img class="" src="../img/logooffice.jpg" width="30%" height="30%">
            </a>
        </div>
        <div class="text-center">
            <h1 class="h3 mb-0">Vui lòng đăng nhập</h1>
            <p>Đăng nhập để quản lý tài khoản của bạn.</p>
        </div>

        <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form">
                <div class="input-group-prepend form__prepend">
                    <!--input-group-text : Hiển thị icon trong thẻ input-->
                    <span class="input-group-text form__text">
                  <i class="fa fa-user form__text-inner"></i>
                </span>
                </div>
                <input type="text" class="form-control form__input" name="username" placeholder="Tên tài khoản">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            </div>

        </div>

        <div class="form-group mb-3">
            <input type="submit" name="dangnhap" class="btn btn-primary login-btn btn-block" value="Đăng nhập">
        </div>

        <!--        GET THÔNG TIN LIÊN HỆ-->
        <?php
        $sql = "select copyright from tbl_lienhe LIMIT 1";
        $lienhe = getRow($sql);
        ?>
        <p class="small text-center text-muted mb-0">
            <?php
            foreach ($lienhe as $item) {
                echo $item['copyright'];
            }
            ?>

        </p>
    </form>
</div>
</body>
</html>

