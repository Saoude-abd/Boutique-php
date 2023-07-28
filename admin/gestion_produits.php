<?php require_once('../inc/init.php'); ?>

<?php


if ($_POST)
{
	// foreach($_POST as $cle => $value){

	// 	echo " $cle: $value <br>";
	// }
	// debug($_FILES, 2);

	$photo_bdd = '';
	if ($_FILES['photo']['name']) {

		
		// on cree le nom de photo que l'on souhaite à l'image uploadé c-a-d on donne un nom a la photo
		
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];


		// url de la  photo dans le dossier a enregistrer dans la bdd
		$photo_bdd .= URL . "/photo/$nom_photo";

		// chemin de la  photo dans le dossier du site
		$photo_dossier = RACINE_SITE . "photo/$nom_photo";
		// on copie la photo  physique dans le dossier photo du site
		copy($_FILES['photo']['tmp_name'], $photo_dossier );
		

	}elseif($_POST['photo_actuelle'])
	{
		$photo_bdd .= $_POST['photo_actuelle'];
	}

   if(isset($_GET['action']) && $_GET['action'] == "modification")
  {
  $pdo->exec("UPDATE produit SET reference = '$_POST[reference]', 
    categorie = '$_POST[categorie]', 
    titre = '$_POST[titre]',
    description = '$_POST[description]', 
    couleur = '$_POST[couleur]', 
    taille = '$_POST[taille]',
    sexe = '$_POST[public]',
	photo = '$photo_bdd', 
    prix = '$_POST[prix]',
	stock = '$_POST[stock]' WHERE id_produit= $_POST[id_produit]");

	header('location: gestion_produits.php');
	exit();

 }else{
	
   $pdo->exec("INSERT INTO produit(reference, categorie, titre, description, couleur, taille, sexe, photo, prix, stock) 
   VALUES('$_POST[reference]','$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]' ,'$photo_bdd', '$_POST[prix]', '$_POST[stock]')");

}

}

if(isset($_GET['action'])&& $_GET['action'] == 'suppression')
{

	$pdo->exec("DELETE FROM produit WHERE id_produit = $_GET[id]");

	header('location: gestion_produits.php');
	exit();
}

// recuperation des produits depuis la bdd le retour de query est un pdo statement
$resultat = $pdo->query("SELECT * FROM produit");

$produits = $resultat->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['action']) && $_GET['action'] == "modification")
{

	$r = $pdo->query("SELECT * FROM produit WHERE id_produit=$_GET[id]");
	$produit_modif = $r->fetch (PDO:: FETCH_ASSOC);



}

$id_produit = (isset($produit_modif['id_produit'])) ? $produit_modif['id_produit'] : '';
$reference = (isset($produit_modif['reference'])) ? $produit_modif['reference'] : '';
$categorie = (isset($produit_modif['categorie'])) ? $produit_modif['categorie'] : '';
$titre = (isset($produit_modif['titre'])) ? $produit_modif['titre'] : '';
$description = (isset($produit_modif['description'])) ? $produit_modif['description'] : '';
$couleur = (isset($produit_modif['couleur'])) ? $produit_modif['couleur'] : '';
$taille = (isset($produit_modif['taille'])) ? $produit_modif['taille'] : '';
$sexe = (isset($produit_modif['sexe'])) ? $produit_modif['sexe'] : '';
$photo = (isset($produit_modif['photo'])) ? $produit_modif['photo'] : '';
$prix = (isset($produit_modif['prix'])) ? $produit_modif['prix'] : '';
$stock = (isset($produit_modif['stock'])) ? $produit_modif['stock'] : '';
$action = (isset($produit_modif['action'])) ? $produit_modif['action'] : '';


?>

 





<?php require_once('inc/head.php'); ?> 


<h2> liste des produits :</h2>

<!-- affichage de tous les produits sur le site -->

<table class="table" border = '1'>
	<thead>
		<tr>
			<?php for($i=0; $i < $resultat->ColumnCount(); $i++):
			$colonne = $resultat->getColumnMeta($i);// retourne un tableau
			?>
			<th><?= $colonne ['name'] ?></th>

			<?php endfor ; ?>
			<th>Action </th>
		</tr>
    </thead>
    <tbody>

	  <?php foreach( $produits as $produit): ?>
		<!-- tr la ligne et td la cellule -->
       <tr>
		<?php foreach($produit as $cle => $value): ?>

			<?php if($cle == "photo"): ?>
            <td>
				<img src="<?= $value ?>" class="img-thumbnail" width="100px" height="100px">
			</td>
			<?php else: ?>
				<td> <?= $value ?> </td>
             <?php endif; ?>
			<?php endforeach; ?>
            
			<td>
				<a href="?action=modification&id=<?=$produit['id_produit'] ?>">Modif</a> <br>
				<a href="?action=suppression&id=<?=$produit['id_produit'] ?>"
				 onclick="return confirm('etes vous sur de vouloir supprimer le produit?')"> Suppr</a>
			</td>

	  </tr>
	  <?php endforeach; ?>
   </tbody>

</table>





<div class="text-center">
	<h1>Ajout d'un produit</h1>
</div>



<form method="post" action="" enctype="multipart/form-data">

		<input type="hidden" name="id_produit" value="<?= $id_produit ?>">
	
		<label for="reference">reference</label>
		<input type="text" name="reference" placeholder="reference" id="reference" class="form-control" value="<?= $reference ?>">

		<label for="categorie">categorie</label>
		<input type="text" name="categorie" placeholder="categorie" id="categorie" class="form-control" value="<?= $categorie?>">

		<label for="titre">titre</label>
		<input type="text" name="titre" placeholder="titre" id="titre" class="form-control" value="<?= $titre ?>">

		<label for="description">description</label>
		<textarea name="description" placeholder="description" id="description" class="form-control"><?=$description ?> </textarea>

		<label for="couleur">couleur</label>
		<select name="couleur" id="couleur" class="form-control">
			<option  <?php if($couleur == 'bleu') echo'selected'; ?> >bleu</option>
			<option <?php if($couleur == 'rouge') echo'selected'; ?> >rouge</option>
			<option <?php if($couleur == 'vert') echo'selected'; ?> >vert</option>
			<option <?php if($couleur == 'blanc') echo'selected'; ?> >blanc</option>
			<option <?php if($couleur == 'noir') echo'selected'; ?> >noir</option>
			<option <?php if($couleur == 'jaune') echo'selected'; ?> >jaune</option>
			<option <?php if($couleur == 'violet') echo'selected'; ?> >violet</option>
			<option <?php if($couleur == 'gris') echo'selected'; ?> >gris</option>
		</select>


		<label for="taille">taille</label>

		<select name="taille" id="taille" class="form-control">
			<option <?php if($taille == 's') echo'selected'; ?> >S</option>
			<option <?php if($taille == 'M') echo'selected'; ?> >M</option>
			<option <?php if($taille == 'L') echo'selected'; ?> >L</option>
			<option <?php if($taille == 'XL') echo'selected'; ?> >XL</option>
		</select>

		<label for="public">public</label>
		<select name="public" id="public" class="form-control">
			<option value="m" <?php if($sexe == 'm') echo'selected'; ?> >Homme</option>
			<option value="f"  <?php if($sexe == 'f') echo'selected'; ?>>Femme</option>
			<option value="mixte" <?php if($sexe == 'mixte') echo'selected'; ?> >Mixte</option>
		</select>

		<label for="photo">photo</label>
		<input type="file" name="photo" id="photo" class="form-control">
		<?php if ($photo): ?>
			<p>Vous pouvez uploader une nouvelle image pour modifier la présente !</p>
			
			<div class="w_30">
				<img src="<?= $photo?>" alt="<?= $titre ?>" class ="img-thumbnail" width="50px" heigth='50px'>

			</div>
			
	   <?php endif; ?>
		<input type="hidden" name="photo_actuelle" value="<?= $photo ?>">

		<label for="prix">prix</label>
		<input type="text" name="prix" placeholder="prix" id="prix" class="form-control" value="<?= $prix ?>">

		<label for="stock">stock</label>
		<input type="text" name="stock" placeholder="stock" id="stock" class="form-control" value="<?= $stock ?>">
		<br><input type="submit" value="enregistrer le produit" class="btn btn-default bg-warning ">
	</form>  


<?php require_once('inc/foot.php'); ?>      