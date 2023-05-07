<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {


    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $comments   = $_POST['comments'];

    $html  ='<table style="width: 100%; border-collapse: collapse; border: 1px solid;">';
    $html .='<tbody>';
    $html .='<tr>';
    $html .='<td style="border: 1px solid; font-weight: 600">Name</td>';
    $html .='<td style="border: 1px solid;">'.$name.'</td>';
    $html .='</tr>';
    $html .='<tr>';
    $html .='<td style="border: 1px solid; font-weight: 600">Email</td>';
    $html .='<td style="border: 1px solid;">'.$email.'</td>';
    $html .='</tr>';
    $html .='<tr>';
    $html .='<td style="border: 1px solid; font-weight: 600">Phone</td>';
    $html .='<td style="border: 1px solid;">'.$phone.'</td>';
    $html .='</tr>';
    $html .='<tr>';
    $html .='<td style="border: 1px solid; font-weight: 600">Comments</td>';
    $html .='<td style="border: 1px solid;">'.$comments.'</td>';
    $html .='</tr>';
    $html .=' </tbody>';
    $html .='</table>';


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.safikulportfolio.online';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@safikulportfolio.online';                     //SMTP username
    $mail->Password   = 'p7eL]*95FEe2rV';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@safikulportfolio.online', 'Safikul Portfolio');
    $mail->addAddress('safikulislam0786@gmail.com', 'Test');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Query From Safikul Portfolio '. time();
    $mail->Body    = $html;

    $mail->send();

    echo 'ok';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

