<?php

//******LẤY THÔNG TIN ĐỂ SỬA CẬP NHẬT***********//

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$sql = "select * from tbl_vanchuyen where id_dangky = '$_SESSION[id_khachhang]' LIMIT 1";
$result = $conn->query($sql);


$count = $result->num_rows;

if ($count > 0) {

    $row = $result->fetch_array();

    $name = $row['name'];
    $phone = $row['phone'];
    $address = $row['address'];
    $note = $row['note'];
} else {
    $name = '';
    $phone = '';
    $address = '';
    $note = '';
}

//******LẤY THÔNG TIN ĐỂ SỬA CẬP NHẬT***********//

if (isset($_SESSION['id_khachhang']) && isset($_SESSION['cart'])) {

    ?>

    <div class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            <div class="step done"><span><a href="index.php?quanly=giohang">Giỏ hàng</a></span></div>
            <div class="step current "><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span></div>
            <div class="step "><span><a href="index.php?quanly=thanhtoandonhang">Thanh toán</a></span></div>
            <div class="step "><span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span></div>
        </div>
        <div class="row">
            <?php

            if (isset($_POST['themvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];

                $sql = "insert into tbl_vanchuyen (name, phone, address, note, id_dangky) values ('$name', '$phone', '$address', '$note', '$_SESSION[id_khachhang]')";
                connectionDB($sql);

                if ($sql) {
                    echo '<script> alert ("Nhập thông tin thành công")</script>';
                }
            } else if (isset($_POST['capnhatvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];

                $sql = "update tbl_vanchuyen set name='$name', phone='$phone', address='$address', note='$note' where id_dangky ='$_SESSION[id_khachhang]'";
                connectionDB($sql);

                if ($sql) {
                    echo '<script> alert ("Cập nhật thông tin thành công")</script>';
                }
            }
            ?>

            <!--*******************FORM THÔNG TIN VẬN CHUYỂN CỦA KHÁCH HÀNG*********************-->
            <style>
                .wrapper {
                    max-width: 100%;
                }

                .input_wrapper {
                    width: 100%;
                }
            </style>

            <div class="wrapper">
                <div class="title">
                    THÔNG TIN VẬN CHUYỂN
                </div>

                <form method="POST" action="">
                    <div class="form">
                        <div class="inputfield">
                            <label>Họ và tên</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="input_wrapper" required/>
                        </div>
                        <div class="inputfield">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="<?php echo $phone; ?>" class="input_wrapper"
                                   required/>
                        </div>
                        <div class="inputfield">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" value="<?php echo $address; ?>" class="input_wrapper"
                                   required/>
                        </div>
                        <div class="inputfield">
                            <label>Ghi chú</label>
                            <input type="text" name="note" value="<?php echo $note; ?>" class="input_wrapper" required/>
                        </div>
                        <div class="inputfield">
                            <?php
                            if ($name == '' && $phone == '') {
                                ?>
                                <button type="submit" class="btn btn-success" name="themvanchuyen"
                                        style="width: 40%; margin: 0 auto; font-size: 15px;">Thêm vận
                                    chuyển
                                </button>
                                <?php
                            } else if ($name != '' && $phone != '') {
                                ?>
                                <button type="submit" class="btn btn-success" name="capnhatvanchuyen"
                                        style="width: 40%; margin: 0 auto; font-size: 15px;">Cập nhật
                                    vận chuyển
                                </button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!--            *************************TABLE CART GIỎI HÀNG***************-->
            <div class="col-md-12">
                <table cellspacing="0" class="shop_table cart">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>

                    <?php

                    $count = 0;
                    $thanhtien = 0;
                    $tongtien = 0;
                    if (isset($_SESSION['cart'])) {

                        foreach ($_SESSION['cart'] as $cart_item) {
                            $count++;
                            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                            $tongtien += $thanhtien;
                            echo '   <tr class="cart_item">
                                <td>' . $count . '</td>
                                <td>' . $cart_item['masanpham'] . '</td>
                                <td>' . $cart_item['tensanpham'] . '</td>
                                <td><img src="admincp/modules/quanlysanpham/uploads/' . $cart_item['hinhanh'] . '" width="110px;"></td>
                                <td>
                                ' . $cart_item['soluong'] . '
                                </td>
                                <td>' . number_format($cart_item['giasanpham'], 0, ',', '.') . 'đ</td>
                                <td>' . number_format($thanhtien, 0, ',', '.') . 'đ</td>
                            </tr>
                            ';
                        }

                        if (isset($_SESSION['dangky'])) {
                            echo '<td colspan="8"><a href="index.php?quanly=thanhtoandonhang">Hình thức thanh toán</a></td>';
                        } else {
                            echo '  <td colspan="8"><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></td>';
                        }

                    } else {
                        echo '<td colspan = "8" style="text-align: center;" > Hiện tại giỏ hàng chưa có sản phẩm </td >';
                    }

                    //                <!--            *************************TABLE CART GIỎI HÀNG***************-->

                    //                        <!--*************************TABLE TỔNG TIỀN GIỎI HÀNG********************-->

                    echo '<div class="cart_totals ">
                    <table cellspacing="0" class="table table-bordered">
                        <tbody>
                        <tr class="cart-subtotal">
                            <th>Tổng tiền</th>
                            <td><span class="amount">' . number_format($tongtien, 0, ',', '.') . ' VNĐ </span></td>
                        </tr>
                        <tr class="order-total">
                            <th>Thành tiền</th>
                            <td><strong><span
                                            class="amount">' . number_format($tongtien, 0, ',', '.') . ' VNĐ </span></strong>
                            </td>
                        </tr>
                        </tbody> 
                    </table>
                </div>
                 </div>';
                    ?>

                    <!--*************************TABLE TỔNG TIỀN GIỎI HÀNG********************-->

            </div>
        </div>
        <!--*******************FORM THÔNG TIN VẬN CHUYỂN CỦA KHÁCH HÀNG*********************-->

    </div>
<?php } ?>
