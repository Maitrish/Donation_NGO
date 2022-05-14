<?php
include "security/co.inc";
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/Donation_NGO/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Donation_NGO/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Donation_NGO/mail/SMTP.php';
$firstName = $_SESSION["firstName"];
$email=$_SESSION["email"];
$otp = $_SESSION["otp"];
$id = $_SESSION["id"];
$mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'ourproject2022@gmail.com'; // email
        $mail->Password = 'Project@00'; // password
        $mail->setFrom('ourproject2022@gmail.com', 'E-Helping-Hand'); // From email and name
        $mail->addAddress($email, $firstName); // to email and name
        $mail->Subject = 'E-Helping_Hand';
        $mail->msgHTML("This is your one time OTP ".$otp); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message sent!";
            echo "<script>window.location.href = 'otpChecker.php?userId=$id';</script>";
        }
        
?>