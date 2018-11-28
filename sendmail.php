<?php

require_once('code/db_fns.php');
require_once('code/common_fns.php');
require_once('code/user_auth_fns.php');
require_once('code/output_fns.php');
require_once('code/email.php');


do_html_doctype("联系_".SITENAME);
?>
<script type="text/javascript" src="static/scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
	var $thirdLink = $(".menu").find('li').eq(0);
	$thirdLink.find('a').addClass("current");

	initialize(); //载入地图
});
</script>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    function initialize() {
        var myLatlng = new google.maps.LatLng(22.651578, 114.078946);
        var myOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var contentString = '<div id="siteNotice">' +
        '<h4>黑鸟设计</h4>' +
        '<div id="bodyContent">' +
        '<p>地址：<span>深圳市龙岗区坂田街道雪象社区园东工业园A栋5楼</span><br />' +
		'手机：<span>15361828193 </span></p>' +

        '</div>' +
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '黑鸟设计'
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    }

</script>
<?php 
do_html_header();
?>

<div id="wrapper" class="container_24">
<?php 
$to= "twotong@gmail.com";
$from = $_POST['email'];
$subject = $_POST['title'];
$message = $_POST['mailcontent']."\n回复邮件：".$from;
$yourname = $_POST['yourname'];


$mail = new EMail;
$mail->Username = '13212847@qq.com';
$mail->Password = 'KTLSHYXQLSRJ';

$mail->SetFrom("13212847@qq.com",$yourname);		// Name is optional
$mail->AddTo($to,SITENAME);	// Name is optional
$mail->AddTo("ytjang@msn.com");
$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Message = $message;

//Optional stuff
$mail->AddCc("ytjang@msn.com","name 3"); 	// Set a CC if needed, name optional
$mail->ContentType = "text/html";        		// Defaults to "text/plain; charset=iso-8859-1"
$mail->Headers['X-SomeHeader'] = 'abcde';		// Set some extra headers if required
$mail->ConnectTimeout = 30;		// Socket connect timeout (sec)
$mail->ResponseTimeout = 8;		// CMD response timeout (sec)

$success = $mail->Send();
if($success){
	echo '<p class="yes">邮件已成功发送，谢谢您的来信，我们会尽快回复您 ！</p>';
}else{
	echo '<p class="error">邮件发送失败，请您用其它方式联系我们，给您带来不便，深表歉意！</p>';
}
?>

</div>
<?php
do_html_footer();
?>