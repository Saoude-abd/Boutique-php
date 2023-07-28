<?php require_once("inc/init.php"); ?>



<?php
// on verifie si dans l'url ($get) s'il ya ue action et que celle ci est egal à deconnexion
if (isset($_GET['action']) && $_GET['action']  == 'deconnexion') 
{

  // on retir le [] membre de la session pour se deconn (ne plus etre authentifié) 
  unset($_SESSION['membre']);
}

// on verifie si l'internaute est authentifié ou pas
if (internauteConnecte())
 {
  header('location:profil.php');
  exit();
}




$erreur = '';
if($_POST)
{

    // foreach($_POST as $cle => $value)
    // {

    // echo "$cle : $value <br>";
    // }

$resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");

  // on va verifier le retour du resulat  si il est à 1 c qu'un membre ete trouver et donc le pseudo £
  if ($resultat->rowCount() == 1 ){

    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    //  debug($membre, 2);
    //  die(); // pour arreter le code ici => debug

    
      //on verifie si le mot passe saisi correspond à celui du membre trouvé.password_verify() compare un mpd saisi avec le hashage qui se trouve sur la bdd pour savoir si cela correspond

      // $mdp = $membre['mdp'];
      // debug($mdp);
      // die();
      if(password_verify( $_POST['mdp'], $membre['mdp']))
      {
        $_SESSION['membre']['id_membre'] = $membre['id_membre'];
        $_SESSION['membre']['pseudo'] = $membre['pseudo'];
        $_SESSION['membre']['nom'] = $membre['nom'];
        $_SESSION['membre']['prenom'] = $membre['prenom'];
        $_SESSION['membre']['email'] = $membre['email'];
        $_SESSION['membre']['civilite'] = $membre['civilite'];
        $_SESSION['membre']['ville'] = $membre['ville'];
        $_SESSION['membre']['cp'] = $membre['code_postal'];
        $_SESSION['membre']['adresse'] = $membre['adresse'];
        $_SESSION['membre']['statut'] = $membre['statut'];


        header('location:profil.php'); // ici on renvoie l'utilisateur sur sa page profil
        exit();

        // debug($_SESSION,2);
        // die();
      }
      else {
        $erreur ="<p> mot de passe incorrect !!!</p>";
      }
  } else {
    $erreur ="<p> pseudo incorrect !!!</p>";
  }
}

?>




<?php require_once("inc/head.php"); ?>

<div class="text-center">
   <h1>Connexion</h1>
</div>

<?php if ($erreur): ?>

  <div class = "alert alert-danger text-center">
    <?= $erreur ?>
  </div>
  <?php endif; ?>
 


<form action="" method ="post">
    <label for="pseudo">Pseudo</label>
    <input  class ="form-control"type="text" name="pseudo">

    <label for="mdp">mot de passe</label>
    <input  class ="form-control" type="text" name="mdp">

    <div class="text-center">

      <input  class ="btn btn-success "type="submit" value ="Envoyer">
    
    </div>

</form>











<?php require_once("inc/foot.php"); ?>