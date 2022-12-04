<?php
session_start();
require_once('../../admincp/config/config.php');
require_once('../../admincp/config/database.php');

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

//*****************************************////Xóa toàn bộ sản phẩm

if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    //    session_destroy();
    //    Xóa toàn bộ những session có trong dự án
    unset($_SESSION['cart']);
    //    Chỉ định xóa session cụ thể
    header("Location: ../../index.php?quanly=giohang");
    exit();
}

//*****************************************////Xóa toàn bộ sản phẩm

//*****************************************////Xóa sản phẩm*******************


if (isset($_SESSION['cart']) && $_GET['xoa']) {
    $id = $_GET['xoa'];

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);
        }

        //        Ví dụ là 8, 9, 10
        //        ID ban đầu là 9
        //        Thì id 9 là bằng 9 nên không thỏa if
        //        thì 8,10 sẽ được gán ở lại trong session

        //        ***************PHẢI HEADER KHÔNG LÀ SAI ĐÓ NHA***********************

        $_SESSION['cart'] = $product;
    }

    header("Location: index.php?quanly=giohang");
    exit();

}

//*****************************************////Xóa sản phẩm*******************

//*****************************************///Thêm số lượng (Sửa)********************///

if (isset($_GET['cong'])) {
    $id = $_GET['cong'];

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);

            $_SESSION['cart'] = $product;
        } else {
            if ($cart_item['soluong'] < 10) {
                $tangsoluong = $cart_item['soluong'] + 1;

                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong,
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);

            }

            $_SESSION['cart'] = $product;
        }
    }

    header("Location: ../../index.php?quanly=giohang");
    exit();
}

//*****************************************///Thêm số lượng (Sửa)********************///

//*****************************************///Trừ số lượng (Sửa)********************///

if (isset($_GET['tru'])) {
    $id = $_GET['tru'];

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);

            $_SESSION['cart'] = $product;
        } else {
            if ($cart_item['soluong'] > 1) {
                $giamsoluong = $cart_item['soluong'] - 1;
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $giamsoluong,
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);

            }

            $_SESSION['cart'] = $product;
        }
    }

    header("Location: ../../index.php?quanly=giohang");
    exit();
}

//*****************************************///Trừ số lượng (Sửa)********************///

//*****************************************////Thêm sản phẩm*******************

if (isset($_POST)) {
    $id = $_GET['idsanpham'];
    $soluong = 1;

    $sql = "select * from tbl_sanpham where id_sanpham = '$id' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $newProduct = array(array('tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong,
        'giasanpham' => $row['giasanpham'], 'hinhanh' => $row['hinhanh'], 'masanpham' => $row['masanpham']));

    if (isset($_SESSION['cart'])) {
        $found = false;

        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] == $id) {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $soluong + 1,
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);

                $found = true;
            } else {
                $product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'],
                    'giasanpham' => $cart_item['giasanpham'], 'hinhanh' => $cart_item['hinhanh'], 'masanpham' => $cart_item['masanpham']);
            }
        }

        if ($found == false) {
            $_SESSION['cart'] = array_merge($product, $newProduct);
        } else {
            $_SESSION['cart'] = $product;
        }


    } else {
        $_SESSION['cart'] = $newProduct;
    }

    header("Location: ../../index.php?quanly=giohang");
    exit();

}
//*****************************************////Thêm sản phẩm*******************

?>
