<?php
require_once(dirname(__FILE__).'/../libs/class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = VT::ayarlar('smtpAdres');
$mail->Port = VT::ayarlar('smtpPort');
$mail->Username = VT::ayarlar('smtpEmail');
$mail->Password = VT::ayarlar('smtpSifre');
$mail->SetFrom($mail->Username, ''.VT::ayarlar('SiteAd').'');