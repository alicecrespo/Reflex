<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';




?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Résultats de votre recherche</title>
		<link rel="stylesheet" href="css/styleRechercheGestionnaire.css" />
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	

	<div class="titre"><h3>Résultats de votre recherche</h3></div>
	<form method="post" action="resultatsRechercheAdministrateur.php">
		<div class="form">
			<label for="user-search">Rechercher un utilisateur : </label>
			<input type="search" id="user-search" name="recherche" aria-label="Search through site content">
			<button>Rechercher</button>


			<div class="resultats">
				<p class="tests">
					<a href="reconnaissanceTonalite.php">Lancement de la série de tests</a>
				</p>

				<p class="envoiMail"><a href="envoyerMail.php">Envoyer un mail</a>
				</p>
				<br/>

			</div>
		</div>
		
	</form>
		

	<?php include("includes/footer.php"); ?>



	</body>
</html>	