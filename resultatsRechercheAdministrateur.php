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
		<link rel="stylesheet" href="css/styleResultatsAdmin.css" />
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<?php 

		if (isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
		    $research = htmlspecialchars($_POST['recherche']);
		    $results = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE "' . $research . '%" OR prenom LIKE "' . $research . '%"'); 
		}
	?>

	<div class="titre"><h3>Résultat(s) de votre recherche</h3></div>
		

			<?php 
				if (isset($results)) {

		            if($results->rowCount() > 0) {

		                
		                while ($r = $results->fetch()) { 

		                	?> <div class="contenu">
									<div class="sousTitre">Informations utilisateur : <?= $r['idUtilisateur'] ?></div><br/><br/>
									<div class="resultats">
		                	
		                	</div>
		                	<div class="type">Type :  </div>
							<div class="Genre">Genre : <?= $r['genre'] ?></div>
							<div class="Nom">Nom : <?= $r['nom'] ?></div>
							<div class="Prénom">Prénom : <?= $r['prenom'] ?></div>
							<div class="Adresse">Adresse : </div>
							<div class="Adresse mail">Adresse mail : <?= $r['mail'] ?></div>


							<div class="options">
								<p class="bannir"><a href="#" style="text-decoration:none">Bannir</a></p>
								<p class="modifier"><a href="#" style="text-decoration:none">Modifier</a></p>
								<p class="supprimer"><a href="#" style="text-decoration:none">Supprimer</a></p>
							</div>
							</div>

							

						<?php 

		                   
		                }
		                

		            } else {
		                echo 'Aucun résultat pour <em>' . $research . '</em>.<br /><br />';
		            }
		        }
		    ?>

			
					
		
		

		




	<?php include("includes/footer.php"); ?>
			
	</body>
</html>	