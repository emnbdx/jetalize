<?php
    require_once("config.php");
    require_once("PHPMailer/src/PHPMailer.php");
    require_once("PHPMailer/src/SMTP.php");
	require_once("PHPMailer/src/Exception.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

	$name = htmlspecialchars($_POST['name']);
	$mail = htmlspecialchars($_POST['email']);
	$tel = htmlspecialchars($_POST['phone']);
	$text = htmlspecialchars($_POST['message']);
		
	//Build mail
	$body = "<html>";
	$body .= "<head><title> $MAIL_SUJET </title></head>";

	$body .= "<body>Bonjour, <br>$name a fait une demande<br><br>";
	if(strlen($tel) != 0) {
		$body .= "Téléphone : $tel<br>";		
	}
	$body .= "Message : $text <br>";
	$body .= "</body>";

	$body .= "</html>";

	// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = Config::$MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = Config::$MAIL_LOGIN;
        $mail->Password   = Config::$MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // To load the French version
        $mail->setLanguage('fr', '/PHPMailer/language/');
        $mail->CharSet    = PHPMailer::CHARSET_UTF8;

        //Recipients
        $mail->setFrom($mail, $name);
        $mail->addAddress(Config::$MAIL_LOGIN);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = "Mail de JetAlize";
        $mail->Body    = $body;
        
        $mail->send();
		echo 'SUCCESS';
    } catch (Exception $e) {
		echo 'ERROR';
    }
?>