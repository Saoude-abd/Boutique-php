<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- lien pour icon supprimer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Boutique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>accueil.php">Accueil</a>
        </li>

    <?php if (! internauteConnecte()) : ?>
         
        
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>connexion.php">Connexion</a>
        </li>

    <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>connexion.php?action=deconnexion">Déconnexion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>profil.php">Profil</a>
        </li>

    <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>panier.php">Panier</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/gestion_produits.php">Gestion des produits</a></li>
            <li><a class="dropdown-item" href="#">Gestion des membres</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class = "container mb-5 mt-5">
