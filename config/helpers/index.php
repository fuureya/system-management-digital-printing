<?php

// buat custom helper di sini gan!

use PHPMailer\PHPMailer\PHPMailer;

function kirimEmail($email, $username)
{
    require_once __DIR__ .  '../../../PHPMailer/PHPMailer.php';
    require_once __DIR__ .  '../../../PHPMailer/SMTP.php';
    require_once __DIR__ .  '../../../PHPMailer/Exception.php';
    require_once __DIR__ . '../../core/env.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = getenv('EMAIL');                     //SMTP username
        $mail->Password   = getenv('SMTP_PASSWORD');                        //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(getenv('EMAIL'), 'Verifikasi Email');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verifikasi Pendaftaran Email';
        $mail->Body    = "Hai bung hari yang cerah! Klik link di bawah ini untuk melakukan verfikasi
        <a href='http://localhost/digital-printing/verifikasi/$username'>Verifikasi Akun</a>";
        -$mail->send();
        return header('Location: ./');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
