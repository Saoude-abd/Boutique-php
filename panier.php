<?php require_once('inc/init.php'); ?>




<?php

// sil £ dans l'url "id_produit_supp" c qu'on a souhaité supprimé un produit du panier ayant cliqué sur la poubelle d'un produit
if(isset($_GET['id_produit_supp'])){
// on 
  retirerProduitPanier($_GET['id_produit_supp']);
}

// s'il £ dans $_post une cle 'ajoutPAnier c que forcement on est passé par le boutton "ajouter au panier" de la fiche d'un produit et donc on cherche à ajooute ce dernier dans le panier (son id est recuperer grace au champ "hidden" du formulaire dans la fiche produit)
if(isset($_POST['ajoutPanier'])){

    //on recupere le produit ayant l'id recupere dans le $_POST
    $r= $pdo->query("SELECT * FROM produit WHERE id_produit =$_POST[id_produit]");

    $produit = $r->fetch(PDO::FETCH_ASSOC);
//on ajoute le produit  dans le panier ou on augmente la quntite s'il existe deja (voir fonction.php)
    ajoutProduitPanier($_POST['id_produit'], $_POST['quantite'], $produit['prix']);
   
}
//  debug($_SESSION, 2);

?>



<?php require_once('inc/head.php'); ?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="accueil.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continuer mes achats</a></h5>
                <hr>
                   <?php if(isset($_SESSION['panier']) && $_SESSION['panier']['id_produit']): ?>


                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">mes articles</p>
                    <p class="mb-0">vous avez 4 produits dans votre panier</p>
                  </div>
                </div>
               <?php for ($i=0; $i < count($_SESSION['panier']     ['id_produit']); $i++ ):
                  $r = $pdo->query ("SELECT * FROM produit WHERE id_produit =" . $_SESSION['panier']['id_produit'][$i] .  " ");

                 $produit = $r->fetch(PDO:: FETCH_ASSOC);
               ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="<?= $produit['photo'] ?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5> <?=$produit['titre'] ?></h5>
                          <p class="small mb-0"><?=$produit['taille'] ?></</p>
                          <p class="small mb-0"><?=$produit['couleur'] ?></</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0"><?= $_SESSION['panier']['quantite'][$i] ?></h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0"><?= $produit['prix']?>£ </h5>
                        </div>
                        <a href="<?= URL ?>panier.php?id_produit_supp=<?=$produit['id_produit']?>" style="color: #cecece;"><i class="fas fa-trash-alt text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endfor; ?>
              </div>

              <div class="col-lg-5">
                <div class="card bg-primary text-white rounded-3">
                  

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total</p>
                      <p class="mb-2"><?= totalPanier()?> </p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>$4818.00</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>
                  </div>
                </div>
              </div>

            <?php   else :?>

              <div class="text-center bg-warning">
                <p>Votre panier est vide pour le moment !</p>

              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   

<?php require_once('inc/foot.php'); ?>