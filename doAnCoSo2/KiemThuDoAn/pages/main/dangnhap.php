<div class="wrapper">
    <div class="title">
        ĐĂNG NHẬP NGƯỜI DÙNG
    </div>
    <form action="" autocomplete="off" method="POST">
        <div class="form">
            <div class="inputfield">
                <label>Email</label>
                <input type="email" name="email" class="input" required/>
            </div>
            <div class="inputfield">
                <label>Mật khẩu</label>
                <input type="password" size="50" name="password" class="input" required/>
            </div>
            <div class="inputfield">
                <input type="submit" name="dangnhap" value="Đăng nhập" class="btn">
            </div>
        </div>
    </form>
</div>

<?php
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "select * from tbl_dangky where email = '$email' and matkhau = '$password' LIMIT 1";

    $result = $conn -> query($sql);

    $row = $result -> fetch_array();

    if ($row) {
        $_SESSION['dangky'] = $row['tenkhachhang'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_khachhang'] = $row['id_dangky'];

        header ("Location: index.php?quanly=giohang");
        ob_end_flush();
    } else {
        echo '<p style="color: red; text-align: center; font-size: 18px;">Email và mật khẩu không đúng. Vui lòng nhập lại</p>';
    }

}
?>

