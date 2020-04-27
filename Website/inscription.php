<?php

   $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    
   if(isset($_POST['forminscription'])) {

      $genre = htmlspecialchars($_POST['choix']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $nom = htmlspecialchars($_POST['nom']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);
      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);

      if(!empty($_POST['choix']) AND !empty($_POST['nom']) AND!empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {

         $nomlength = strlen($nom);
         $prenomlength = strlen($prenom);

         if($prenomlength <= 255) {
            if($nomlength <= 255){
               
               if($mail == $mail2) {
                  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                     $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ?");
                     $reqmail->execute(array($mail));
                     $mailexist = $reqmail->rowCount();

                     if($mailexist == 0) {

                        if($mdp == $mdp2) {

                           $insertmbr = $bdd->prepare("INSERT INTO utilisateur(genre, prenom, nom, mail, motDePasse) VALUES(?, ?, ?, ?, ?)");
                           $insertmbr->execute(array($genre, $prenom, $nom, $mail, $mdp));


                           $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                           
                        } else {
                           $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                     } else {
                        $erreur = "Adresse mail déjà utilisée !";
                     }
                  } else {
                     $erreur = "Votre adresse mail n'est pas valide !";
                  }
               } else {
                  $erreur = "Vos adresses mail ne correspondent pas !";
               } 
            } else {
               $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
            }
            
         } else {
            $erreur = "Votre prenom ne doit pas dépasser 255 caractères !";
         }

      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }
   }
?>





<html>
   <head>
      <title>Reflex</title>
      <meta charset="utf-8">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/header.css" rel="stylesheet">
      <link href="css/footer.css" rel="stylesheet">
      <link href="css/inscription.css" rel="stylesheet">
   </head>
   <body>

      <?php include("includes/header.php"); ?>

      <section id="login-box">

         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <br /><br />

            <table>

               <div class="textbox">
                  <tr>
                     <td>
                        <select name="choix">
                            <option value="Femme">Femme</option>
                            <option value="Homme">Homme</option>
                            <option value="Autre">Autre</option>
                           
                        </select>
                        <!-- <input type="text" placeholder="Votre genre" id="genre" name="genre" value="<?php //if(isset($genre)) { echo $genre; } ?>" /> -->
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <input type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     
                     <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+)).*$" required>
                     </td>
                  </tr>
                  <tr>
                    
                     <td>
                        <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                     </td>
                  </tr>
               </div>

               
            </table>
            <tr>
                  
                  <td align="center">
                     <br />
                     <input class="btn" type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
         </form>
         <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
         ?>

      </section>

      <?php include("includes/footer.php"); ?>
   </body>
</html>