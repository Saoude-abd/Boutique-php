<?php require_once("inc/init.php"); ?>

<?php 
    // DISTINCT permet d'eviter les doublon et recuperer la donnée qu'une seul fois
  $r = $pdo->query ("SELECT DISTINCT(categorie) FROM produit");
   $categories = $r->fetchAll(PDO:: FETCH_ASSOC);
  //    debug($categories, 2);

// s'il ya une categorie dans l'url ( donc nous avons cliqué sur une categorie)
  if(isset($_GET['categorie']))
  {
   // on recupere les produits de la cat en question ( qui se trouve dans l'url)
    $r = $pdo->query("SELECT * FROM produit WHERE categorie = '$_GET[categorie]'");

  }else
  {

    // on recupere tous les produits sans condition
    $r = $pdo->query("SELECT * FROM produit");
  }

// quoi q'il arrive on recupere les produits
  
  $produits = $r->fetchAll(PDO:: FETCH_ASSOC);
?>





<?php require_once("inc/head.php"); ?>
<div class="container">
    <div class="dropdown">
        <button class="btn btn-secondary   dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </button>
     <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

     
     <li>
        <a class="dropdown-item" href="<?= URL
        ?>accueil.php"> tous les produits </a></li>

        <?php foreach($categories as $value):?>

            <li><a class="dropdown-item" href="?categorie=<?=$value['categorie']?>"> 
          <?= $value['categorie'] ?> </a></li>

        <?php endforeach; ?>


        </ul>
    </div>
    <div class="row justify-content-center mt-5">
      <?php  foreach($produits as $produit): ?>   
        <div class="card m-1" style="width: 18rem;">
        <img src="<?= $produit['photo'] ?>"    class="card-img-top" alt="...">
        <div class="card-body">
           <h5 class="card-title"><?= $produit['titre'] ?></h5>
          <p><?= $produit['prix'] ?></p>
          </p>
         <a href="<?= URL ?>fiche-produit.php?id=<?=$produit['id_produit'] ?>" class="btn btn-primary">voir le  produit</a>
       </div>            
        </div>
      <?php endforeach; ?>
  </div>

</div>




<?php require_once("inc/foot.php"); ?>