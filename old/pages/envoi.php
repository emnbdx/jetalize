<?php
if(isset($_POST['envoyer'])) {
	//mysql_real_escape_string(htmlspecialchars($_POST['commentaire']))
	$objet = htmlspecialchars(stripslashes($_POST['objet']));
	$message = htmlspecialchars(stripslashes($_POST['message']));
	$email = htmlspecialchars($_POST['email']);
	$nom = htmlspecialchars($_POST['nom']);
	
	$test = $objet.$message.$email.$nom;
	
	if(!empty($test)) {
		$message_html = '	<html>
							<body>
							<b>Objet : </b>'.$objet.'<br>
							<b>Nom :</b>'.$nom.'<br>
							<b>E-Mail :</b>'.$email.'<br>
							<b>Message :</b>'.nl2br($message).'
							</body>
							</html>';
		
		
		if (
		mail(	'contact@jetalize.fr',
				$objet, 
				$message_html, 
				"From: contact@jetalize.fr\r\n"."Bcc:damien.venault@gmail.com\r\n"."Reply-To: $email\r\n"."Content-Type: text/html; charset=\"iso-8859-1\"\r\n")) 
			{ header('Location: ../index.php?p=6&form=y'); }
		else { header('Location: index.php?p=6&form=n'); }
	}//Fin du test
	else { header('Location: ../index.php?p=6'); }
	
}
?>