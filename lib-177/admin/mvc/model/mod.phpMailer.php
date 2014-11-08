<?php
ob_start();
$mail = new PHPMailer();
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = 'mailer177@gmail.com';
$mail->Password = 'mailer17704';
$mail->setFrom('mailer177@gmail.com', 'Mailer of lp177');
//Set an alternative reply-to address
$mail->addReplyTo('lp177@live.fr', 'lp177');
//Set who the message is to be sent to
$mail->addAddress('lucperez177@gmail.com', 'John Doe');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML('
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>PHPMailer Test</title>
</head>
<body>
  <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
    <h1>This is a test of PHPMailer.</h1>
    <div align="center">
      <a href="https://github.com/PHPMailer/PHPMailer/"><img src="images/phpmailer.png" height="90" width="340" alt="PHPMailer rocks"></a>
    </div>
    <p>This example uses <strong>HTML</strong>.</p>
    <p>The PHPMailer image at the top has been embedded automatically.</p>
  </div>
</body>
</html>');
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->addAttachment('library/img/phpmailer_mini.gif');

if(!$mail->send())
  $affiche = '<h1 class="white center">Mailer Error: '.$mail->ErrorInfo.'</h1>';
else
  $affiche = '<h1 class="white center">Message sent!</h1>';
$affiche .= '<br><br><h2>Trace:</h2>'.ob_get_contents();
ob_end_clean();
?>