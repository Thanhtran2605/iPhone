<?php
if (isset($_POST['doimatkhau'])) {
    $email = trim($_POST['email']);
    $password_new = trim(md5($_POST['password_new']));
    $password_old = trim(md5($_POST['password_old']));

    $sqlPasswordOld = "select * from tbl_dangky where email = '$email' and matkhau = '$password_old' LIMIT 1";
    $row = getRow($sqlPasswordOld);

    if (count($row) > 0) {
        $sqlUpdateA = "update tbl_dangky set matkhau = '$password_new' where email = '$email'";
        connectionDB($sqlUpdateA);

        echo '<p style="color: green; text-align: center; font-size: 18px;">Mật khẩu đã được thay đổi.</p>';
    } else {
        echo '<p style="color: red; text-align: center; font-size: 18px;">Tài khoản và Mật khẩu cũ không đúng vui lòng nhập lại.</p>';

    }

    header("Location: index.php?quanly=giohang");
    exit();

}
?>

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container ">
        <div class="row">
            <div class="wrapper">
                <div class="title">
                    THAY ĐỔI MẬT KHẨU
                </div>
                <form action="" autocomplete="off" method="POST">
                    <div class="form">
                        <div class="inputfield">
                            <label>Email</label>
                            <input type="email" name="email" class="input" required/>
                        </div>
                        <div class="inputfield">
                            <label>Mật khẩu cũ</label>
                            <input type="password" name="password_old" class="input" required/>
                        </div>
                        <div class="inputfield">
                            <label>Mật khẩu mới</label>
                            <input type="password" name="password_new" class="input" required/>
                        </div>
                        <div class="inputfield">
                            <input type="submit" name="doimatkhau" value="Thay đổi mật khẩu" class="btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

