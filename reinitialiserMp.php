<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réinitialisation de votre mot de passe </title>
		<link rel="stylesheet" href="css/styleReMp.css" />
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h3>Réinitialisez votre mot de passe</h3></div>
	
	
		<form method="post" action="traitementReMp.php">
			

				<p class="champs"> * champs obligatoires</p>
				<p><label for="mp">Mot de passe : <strong>*</strong> </label>  </p><! attribut for doit être le même que l'id du label/input auquel il est rattaché> 
				<p><input type="password" name="motPasse" id="mp" size="50" required/> </p>
				
				<p><label for="Cmp"> Confirmation du mot de passe : <strong>*</strong> </label>  </p><! attribut for doit être le même que l'id du label/input auquel il est rattaché> 
				<p><input type="password" name="CmotPasse" id="Cmp" size="50" required/> </p>

				<p class="envoi"><input class ="boutton"type="submit"  value="Réinitialiser le mot de passe"/></p>

			
		
		</form>

	<?php include("includes/footer.php"); ?>

	</body>
</html>	