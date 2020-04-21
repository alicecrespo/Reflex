<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');


include 'function/cookie.php';

 
if(isset($_GET['idUtilisateur']) AND $_GET['idUtilisateur'] > 0) {
   $getid = intval($_GET['idUtilisateur']);
   $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE idUtilisateur = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();


?>




<html>
    <head>
        <meta charset="utf-8" />
        
        
        
        <link href="css/monCompte.css" rel="stylesheet">
        <title>Mon compte</title>
    </head>

    <body>

        <?php include("includes/header.php"); ?>

        

        <section class="barreDeRecherche">
            <label for="site-search">Rechercher un utilisateur :</label>
            <input type="search" id="site-search" name="recherche utilisateur" aria-label="Search through site content">
            <button>Rechercher</button>
        </section>

        <div id="milieuPage">
        
        <!-- check si c'est admin ou autre -->
        <nav class="menuAdmin">
            <div class="menuAdmin">
                <ul>
                    
                </ul>
            </div>
        </nav>

        <section class="mesInfos">
            <h1>Vos informations</h1>

            <ul>
                <li>Genre : <?php echo $userinfo['genre']; ?></li><br>
                <li>Nom : <?php echo $userinfo['nom']; ?> </li><br>
                <li>Prénom : <?php echo $userinfo['prenom']; ?></li><br>
                <li>Adresse :</li><br>
                <li>Adresse mail : <?php echo $userinfo['mail']; ?></li>

            </ul>
        </section>
        </div>

        <?php include("includes/footer.php"); ?>

    </body>
</html>
<?php   
}
?>