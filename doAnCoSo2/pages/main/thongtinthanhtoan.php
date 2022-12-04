<?php

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

if (isset($_SESSION['cart']) && isset($_SESSION['id_khachhang']) && ($count > 0)) {

    ?>

    <div class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            <div class="step done"><span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span></div>
            <div class="step done"><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span></div>
            <div class="step  current"><span><a href="index.php?quanly=thanhtoandonhang">Thanh toán</a><span></div>
            <div class="step"><span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span></div>
        </div>
    </div>


    <form action="pages/main/xulythanhtoan.php" method="POST">
        <div class="maincontent-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Thông tin vận chuyển và đơn hàng</h4>
                        <p>Họ và tên vận chuyển: <b><?php echo $name; ?></b></p>
                        <p>Số điện thoại: <b><?php echo $phone; ?></b></p>
                        <p>Địa chỉ: <b><?php echo $address; ?></b></p>
                        <p>Ghi chú: <b><?php echo $note; ?></b></p>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--*************************TABLE TỔNG TIỀN GIỎI HÀNG********************-->

        <?php
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $item) {
            $tongtien += $item['giasanpham'] * $item['soluong'];
        }

        $tongtien_vnd = $tongtien;
        ?>
        <!--        ***********HÌNH THỨC THANH TOÁN******************-->
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Hình thức thanh toán</h4>
                        <div id="payment">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input type="radio" data-order_button_text="" checked="checked"
                                           placeholder="..." name="payment" value="tienmat" class="input-radio"
                                           id="payment_method_bacs">
                                    <label for="payment_method_bacs">Tiền mặt </label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>Thanh toán khi nhận hàng.</p>
                                    </div>
                                </li>
                                <li class="payment_method_bacs">
                                    <input type="radio" data-order_button_text="" checked="checked"
                                           placeholder="..." name="payment" value="chuyenkhoan" class="input-radio"
                                           id="payment_method_bank">
                                    <label for="payment_method_bank">Chuyển khoản</label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>Vui lòng thanh toán đơn hàng bằng ví.</p>
                                    </div>
                                </li>
                                <br/>

                                <span style="float: left; color: red; margin-top: -18px; text-transform: uppercase;">Tổng tiền cần thanh
                                toán : <?php echo '<b>' . number_format($tongtien, 0, ',', '.') . 'VNĐ </b>' ?>
                            </span>
                                <!--                NAME CHƯA THÊM VÀO LÀ CHUÔI JASON CÒN THÊM TRẢ VỀ CỔNG THANH TOÁN NCB-->

                                <!--                    REDIRECT QUAN TRONGJ-->
                                <br/>

                                <div class="form-row place-order">
                                    <input type="submit" data-value="Place order" id="place_order" name="redirect"
                                           value="Thanh toán ngay" class="button alt">
                                </div>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4>Hình thức thanh toán VNPAY </h4>
                        <div id="payment">
                            <ul class="payment_methods methods">
                                <li class="payment_method_paypal">
                                    <input type="radio"
                                           aria-describedby="emailHelp"
                                           placeholder="..." name="payment" value="vnpay" class="input-radio"
                                           id="payment_method_paypal">
                                    <label for="payment_method_paypal">VNPAY <img src="img/vnpay.jpg" width="35%;">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4>Hình thức thanh toán MOMO</h4>
                        <div id="payment">
                            <ul class="payment_methods methods">
                                <form action="pages/main/xulythanhtoanmomo.php" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">
                                    <li class="payment_method_bacs">
                                        <input type="hidden" value="<?php echo $tongtien_vnd; ?>" name="tongtien_vnd">
                                        <input type="submit" name="momo" value="Thanh toán MOMO QRcode"
                                               class="input-radio">
                                    </li>
                                </form>

                                <li class="payment_method_paypal">
                                    <label for="payment_method_paypal"><img src="img/momo.png" width="15%">
                                    </label>
                                </li>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </form>
    <!--        ***********HÌNH THỨC THANH TOÁN******************-->
<?php } else {
    header("Location: index.php?quanly=vanchuyen");
    exit();
} ?>