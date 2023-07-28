<?php require_once("inc/init.php"); ?>

<?php

if (!internauteConnecte()) {

    // headre() est une fonction predefinie qui permet de renvoyer vers une page
    header('location:connexion.php');
 exit();
}

?>

<?php require_once("inc/head.php"); ?>






<?php
// debug($_SESSION, 2);?>


<h5> Bonjour <?= $_SESSION['membre']['nom'] . ' ' . $_SESSION['membre']['prenom'];?>

<h6> Voici vos informations : </h6>

<p>
    <strong>Email</strong> <?= $_SESSION['membre']['email'];?>
</p>

<p>
    <strong>Pseudo</strong> <?= $_SESSION['membre']['pseudo'];?>
</p>


<p>
    <strong>adresse</strong> <?= $_SESSION['membre']['adresse'] . ' ,' .
    $_SESSION['membre']['cp'] . ' ' . $_SESSION['membre']['ville'];?>
</p>








<?php require_once("inc/foot.php"); ?>