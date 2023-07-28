
<?php include_once("inc/init.php"); ?>



<?php

if (internauteConnecte())
{
  header('location:profil.php');
  exit();
}


   $erreur =''; 
   
  if ($_POST) {
    
    // foreach($_POST as $cle =>$value)
    // {

    // echo "$cle : $value <br>";
    // }

    if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20)
    {

     $erreur .= "<p> le pseudo doit faire entre 3 et 20 caractères ! </p>";

   
    }

    if(! preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])) // reg_ex (expressions regulières) restruction des saisies au nivau de formulair
    {

      $erreur .= "<p> le pseudo doit contenir entre uniquement des alphanumeriques et . _ - </p>";

    }

 // on cherche ds la bdd si un membre existe deja avec  l'email saisie dans le formulaire
 
    $resultat = $pdo->query("SELECT * FROM membre WHERE email = '$_POST[email]'");

 // si nombre des lignes retournés  par la requete precedante  egal à 1  , cela v dire q'uil ya un membre deja ayant cet email  dans bdb 

if ($resultat-> rowCount() == 1) {
    
    $erreur .= "<p> un compte a été crée avec cette adresse! </p>";

}

// on crypte le mot de passe avant de l'envoye en bdd
 $mdpHash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


//  debug($_POST['mdp']);
//  die();
// si $err est vide cela prouve que tout est bon car nous ne rentrons dans aucune condition precedentes nous pouvons donc envoyer les données en bdd

    if(!$erreur)
    {
    
        $pdo->exec("INSERT INTO membre   (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse)
    VALUES
    ('$_POST[pseudo]','$mdpHash','$_POST[nom]', '$_POST[prenom]', '$_POST[email]', 
    '$_POST[civilite]', '$_POST[ville]', '$_POST[cp]', '$_POST[adresse]')");

    $content .= "<div class='alert alert-succes'>Inscription validé ! </div>";

    }
    htryetgrjykule(ynrt ujyutrerfyh)

}



?>






<?php include_once("inc/head.php"); ?>

<?php if($erreur): // ouverture de if?> 
<div class= "alert alert danger">

   <?= $erreur ?> <!-- revient à faire un echo $erreur dans la balise php-->
    
</div>
<?php endif; //fermeture de if?>

<?= $content ?>





<form action="" method="post">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" class="form-control">

    <label for="nom">nom</label>
    <input type="text" name="nom" class="form-control">

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" class="form-control">

    <label for="email">email</label>
    <input type="email" name="email" class="form-control">

    <label for="mdp">mot de passe</label>
    <input type="password" name="mdp" class="form-control">

    <select name="civilite" class="form-control">
        <option value="m">Homme</option>
        <option value="f">Femme</option>
    </select>

    <label for="ville">ville</label>
    <input type="text" name="ville" class="form-control">

    <label for="cp">code postal</label>
    <input type="text" name="cp" class="form-control">

    <label for="adresse">adresse</label>
    <textarea name="adresse" class="form-control"></textarea>
    <div class="text-center">
        <input class="m-2 btn btn-success" type="submit" value="envoyer">
    </div>
</form>










<?php include_once("inc/foot.php"); ?>