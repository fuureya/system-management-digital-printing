<?php

// buat custom helper di sini gan!

use PHPMailer\PHPMailer\PHPMailer;

function kirimEmail($email, $vcode)
{

    require_once __DIR__ .  '../../../PHPMailer/PHPMailer.php';
    require_once __DIR__ .  '../../../PHPMailer/SMTP.php';
    require_once __DIR__ .  '../../../PHPMailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'papibat22@gmail.com';                     //SMTP username
        $mail->Password   = 'qsxr numz sewk rbdk';                        //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('papibat22@gmail.com', 'Verifikasi Email');
        $mail->addAddress($email);

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verifikasi Email';
        $mail->Body    = "HOHOHO! Klik link di bawah ini untuk melakukan verfikasi
        <a href='http://localhost/dgprint/admin/verify.php?email=$email&vcode=$vcode'>Verifikasi Akun</a>";
        -$mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
