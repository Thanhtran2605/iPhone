<?php
// FPDF DÙNG ĐỂ IN HÓA ĐƠN
require_once('../../../tfpdf/tfpdf.php');
//THÊM TFPDF ĐỂ KHÔNG LỖI FONT
require_once('../../config/config.php');

$pdf = new TFPDF('p', 'mm', 'A4');
$pdf->AddPage("0"); // Page Horizontal // 1: Vertical

//SET FONT DEJAVU
$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true); // file làm cho chữ in đậm hơn
$pdf->SetFont('DejaVu', '', 18);

//SELECT TƯƠNG TỰ XEM ĐƠN HÀNG
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

$sql = "select * from tbl_chitietdonhang inner join tbl_sanpham on tbl_chitietdonhang.id_sanpham = tbl_sanpham.id_sanpham
and tbl_chitietdonhang.ma_thanhtoan = '$_GET[code]' order by tbl_chitietdonhang.id_chitietdonhang DESC";

$conn->set_charset('utf8');

$result = $conn -> query($sql);


//SET HEADER
$pdf->Write(10, 'TÁO XANH', $pdf->SetTextColor(27, 209, 114));

$pdf->SetTextColor(13, 13, 13);
$pdf->Ln(10); // Line 10 ngắt dòng
$pdf->Write(10, 'Đơn hàng của bạn gồm có:');
$pdf->Ln(15); // Line 10 ngắt dòng

$pdf->SetFillColor(27, 209, 114);

$fill = false;

$width_cell = array(15, 35, 80, 40, 50, 60); // cột thứ nhất, thứ 2

$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Mã hàng', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 1, 'C', true);

$i = 0;
while ($row = $result->fetch_assoc()) {
    $i++;
    $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['ma_thanhtoan'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, $row['tensanpham'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['soluongmua'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, number_format($row['giasanpham']) . 'đ', 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[5], 10, number_format($row['soluongmua'] * $row['giasanpham']) . 'đ', 1, 1, 'C', $fill);
    $fill = !$fill;

}

$pdf->Ln(5); // Line 10 ngắt dòng
$pdf->Write(10, 'Cảm ơn bạn đã đặt hàng tại website chúng tôi!');

$pdf->Output();
?>

