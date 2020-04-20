<?php
require_once("includes/common.php");
require_once('data/option.php');
$optionClass = new SiteOption();
$model = $optionClass->get_config("smtp");

$data  = json_decode($model['config_values'],true);


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Models\EmailTemplate;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $data['host'];                          // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $data['username'] ;                     // SMTP username
    $mail->Password   = $data['password'] ;                     // SMTP password
    $mail->SMTPSecure = ($data['SMTPSecure']=="1") ? 'ssl':'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = (int)$data['port'];                                    // TCP port to connect to

    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom($data['username'], 'Mailer');
    $mail->addAddress('twotong@gmail.com', 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($data['username'], 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '这是一封测试邮件';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $result = array ('status'=>1,'message'=>'发送邮件成功');
    echo json_encode($result);
   
} catch (Exception $e) {
    $result = array ('status'=>2,'message'=>'发送邮件失败，错误信息：'. $mail->ErrorInfo);
    echo json_encode($result);
}