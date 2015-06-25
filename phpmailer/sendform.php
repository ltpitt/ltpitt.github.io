<?php
require 'PHPMailerAutoload.php';

header("Access-Control-Allow-Origin: *");

$mail = new PHPMailer;

//$_POST["inputName"]='Davide Nastri';
//$_POST["inputEmail"]='geppetto@geppo.it';
//$_POST["inputPhone"]='347';
//$_POST["inputMessage"]='Ti scrivo molto';

//echo $_POST["inputName"];
//echo $_POST["inputEmail"];
//echo $_POST["inputPhone"];
//echo $_POST["inputMessage"];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.giardinoperfetto.it';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'giardinoperfetto.it';                 // SMTP username
$mail->Password = 'magare6060';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'info@giardinoperfetto.it';
$mail->FromName = 'Richiesta da www.davidenastri.it';
$mail->addAddress('d.nastri@gmail.com', 'Davide Nastri');     // Add a recipient
$mail->addReplyTo($_POST["inputEmail"]);
//$mail->addReplyTo('info@giardinoperfetto.it', 'Informazioni - Giardinoperfetto.it');
//$mail->addCC('cc@example.com');
//$mail->addBCC('d.nastri@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Richiesta da www.davidenastri.it';

$mail->Body    = 'Dati cliente da ricontattare:<br><br>Nome e cognome: <strong>' . $_POST['inputName'] . "</strong><br>
" . 'Email: <strong>' . $_POST['inputEmail'] . "</strong><br>
" . 'Messaggio: <strong>' . $_POST['inputMessage'] . "</strong>";

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


?>
