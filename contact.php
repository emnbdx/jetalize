<?php
	$MAIL_ADRESSE = 'contact@jetalize.fr';
	$MAIL_SUJET = 'Contact via le site';

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
	// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

	// En-têtes additionnels
	$headers .= 'To: "Jetalize"<' . $MAIL_ADRESSE . '>' . "\r\n";
	$headers .= 'From: "'. $name . '"<' . $mail . '>' . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";

	if(mail($MAIL_ADRESSE, "Mail de Jetalize", $body, $headers)) {
		echo 'SUCCESS';
	} else {
		echo 'ERROR';
	}
?>