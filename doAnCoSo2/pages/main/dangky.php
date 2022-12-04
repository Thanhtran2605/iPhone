<?php
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

    if (isset($_POST['dangky'])) {
        $hovaten = $_POST['hovaten'];
        $email = $_POST['email'];
        $sodienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);

        $sql = "insert into tbl_dangky(tenkhachhang, email, diachi, matkhau, sodienthoai) values ('$hovaten', '$email',
                '$diachi', '$matkhau', '$sodienthoai')";

        $result = $conn -> query($sql);

        echo '<p style="color: green; text-align: center; font-size: 18px;">Bạn đăng ký thành công</p>';
        $_SESSION['id_khachhang'] = $conn -> insert_id;
        $_SESSION['email'] = $email;
        $_SESSION['dangky'] = $hovaten;

        header ("Location: index.php?quanly=giohang");
        ob_end_flush();
    }
?>

<div class="wrapper">
    <div class="title">
        ĐĂNG KÝ
    </div>
    <form method="POST" action="">
        <div class="form">
            <div class="inputfield">
                <label>Tên người dùng</label>
                <input type="text" class="input" required name="hovaten"/>
            </div>
            <div class="inputfield">
                <label>Email</label>
                <input type="email" name="email" class="input" required/>
            </div>
            <div class="inputfield">
                <label>Điện thoại</label>
                <input type="text" name="dienthoai"  class="input" required/>
            </div>
            <div class="inputfield">
                <label>Địa chỉ</label>
                <input type="text" size="50" name="diachi"  class="input" required/>
            </div>
            <div class="inputfield">
                <label>Mật khẩu</label>
                <input type="password" size="50" name="matkhau" class="input" required/>
            </div>
            <div class="inputfield">
                <input type="submit" name="dangky" value="Đăng ký" class="btn">
            </div>
            <div class="inputfield">
                <a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
            </div>
        </div>
    </form>
</div>
