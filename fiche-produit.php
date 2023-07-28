<?php require_once("inc/init.php"); ?>

<?php


if(isset($_GET['id'])){

    //on recupere le produit dont l'id est celui qui se trouve dans l'url
    $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_GET[id]' ");


    $produit = $r->fetch(PDO::FETCH_ASSOC);
}

?>
<?php require_once("inc/head.php"); ?>

<div class="row container">
    <div class="col-md-4">
        <img class="img-fluid" src="<?=$produit['photo'] ?>" alt="">
    </div>
    <div class="col-md-8 text-center text-center">
        <h1><?= $produit['titre'] ?></h1>

        <h6>categorie :<?= $produit['categorie'] ?> </h6>

        <h6>couleur : <?= $produit['couleur'] ?> </h6>
        <h6>taille : <?= $produit['taille'] ?> </h6>

        <p><?= $produit['description'] ?></p>

        <h5>prix : <?= $produit['prix'] ?> </h5>

        <h6>Il en reste : <?= $produit['stock'] ?></h6>
   
     <form action="<?=URL ?>panier.php"    method="post">
    
          <input type="hidden" name ="id_produit" value ="<?= $produit['id_produit'] ?>">

        <label for="quantite">Quantité

        </label>

        <select name ="quantite">
        <?php for ($i=1; $i<= $produit['stock']; $i++): ?>
            <option><?= $i?></option>
           <?php endfor; ?>
    
        </select>
        <input  class = "btn btn-success" type="submit" value = "ajouter au panier" name ="ajoutPanier">

     </form>
    
    </div>
</div>




<?php require_once("inc/foot.php"); ?>
