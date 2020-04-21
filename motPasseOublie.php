<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mot de passe oublié ? </title>
		
		<link href="css/style.css" rel="stylesheet">
		<link href="css/styleMp.css" rel="stylesheet">
	</head>

	<body>

		<?php include("includes/header.php"); ?>

		<div class="titre"><h3>Mot de passe oublié ?</h3></div>
		<div class="formu">
			<form method="post" action="traitementMp.php">
				
				<div id="mp">

					<p class="champs"> * champs obligatoires</p>
					<p><label for="mail">Adresse mail du compte : <strong>*</strong> </label>  </p><! attribut for doit être le même que l'id du label/input auquel il est rattaché> 
					<p><input type="email" name="mailDestinataire" id="mail" size="50" required/> </p>
					

					<input class="envoi" type="submit" value="Envoyer un mail de récupération"/>

				</div>

			</form>
		</div>

		<?php include("includes/footer.php"); ?>



	</body>
</html>	