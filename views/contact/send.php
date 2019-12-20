<?php
require_once("../../includes/common.php");
require_once('../../data/option.php');

session_start();

require '../../vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//$optionClass = new SiteOption();

if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Checking that the posted phrase match the phrase stored in the session

            $model = $siteOptionClass->get_config("smtp");
            $data  = json_decode($model['config_values'], true);


            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = $data['host'];                          // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $data['username'];                     // SMTP username
                $mail->Password   = $data['password'];                     // SMTP password
                $mail->SMTPSecure = ($data['SMTPSecure'] == "1") ? 'ssl' : 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = (int) $data['port'];                                    // TCP port to connect to

                $mail->CharSet = 'UTF-8';
                //Recipients
                $mail->setFrom($data['username'], $_POST['name']);
                //sales@nanlite.com
                $mail->addAddress($site_info["email_contact"], $site_info["sitename"]);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo($data['username'], 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $message = "<p>姓名：" . $_POST['name'] . "</p>";
                $message = $message . "<p>电话：" . $_POST['phone'] . "</p>";
                // $message = $message."<p>邮箱：".$_POST['email']."</p>";          
                $message = $message . "<p>消息：" . $_POST['message'] . "</p>";
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "【先通网站】联系表单";
                $mail->Body    = $message;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                $result = array('status' => 1, 'message' => '发送邮件成功');
                echo json_encode($result);
            } catch (Exception $e) {
                $result = array('status' => 2, 'message' => '发送邮件失败，错误信息：' . $mail->ErrorInfo);
                echo json_encode($result);
            }
        }
    } else {
        $result = array('status' => 2, 'message' => '发送邮件失败，错误信息：token 不正确！');
        echo json_encode($result);
    }
}
