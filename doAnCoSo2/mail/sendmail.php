<?php

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

//SỬ DỤNG THƯ VIỆN GỬI MAIL PHP MAILER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {

public function dathangmail($tieude, $noidung, $maildathang)
{
    // Passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $mail->Charset = 'UTF-8';

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output Show dù thành công hay không
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tranthithanh.dh2021@gmail.com';                 // SMTP username
        $mail->Password = 'zqpfdxzatgjfhcud';                           // SMTP password của acc mail chớ không phải mật khẩu mail
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('tranthithanh.dh2021@gmail.com', 'TaoXanh');
        $mail->addAddress($maildathang, 'Customer');     // Add a recipient     // Name is optional
//    addAddress là gửi nhiều người
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');
//    DÒNG TRÊN DÙNG ĐỂ BACKUP LẠI MAIL TIẾP TIẾP

        //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $tieude;
        $mail->Body = $noidung;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

}
?>

<!--Mật khẩu -->
<!--*5T1^a#AoW5yR47UIBS$-->

<!--Mật khẩu database-->
<!--taododo-->
<!--WxV/E8=GE1#|~oP+-->