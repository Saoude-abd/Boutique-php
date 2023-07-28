

<?php

function debug($var, $mode = 1) // la fonction debug => v dire verifier
{
  $trace = debug_backtrace(); // tracer la ligne ou on est
$trace = array_shift($trace); // recuperer le 1er element






echo "<strong> debug demandé dans le fichier : $trace[file] 
 à la ligne $trace[line]  </strong>";

if($mode == 1){
    echo "<pre> "; var_dump($var) ; echo"<pre>";
}else{
    echo "<pre> "; print_r($var) ; echo"<pre>";
}


}

function internauteConnecte()
{
  if(!isset($_SESSION['membre'])){
    return false;
  }else{
    return true;
  }
}

 function creationPanier()
 {
  if(!isset($_SESSION['panier']))
  { $_SESSION['panier'] = [];
  $_SESSION['panier']['id_produit']= [];
  $_SESSION['panier']['quantite']= [];
  $_SESSION['panier']['prix']= [];}
 

 }

 function ajoutProduitPanier($id_produit, $quantite, $prix)
 {
// creation d'un panier ou sa recuperation s'il existe deja
  creationPanier();
// on cherche si l'id du produit que l'on souhaite ajouter dans le panier 'existe pas deja en retournant sa position dans le [] "id_produit" dans le "panier" dans la session
  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);

// si la position n'est pas false c que l'id a ete trouve et donc nous n'ajouterons pas une nouvelle ligne de produit mais on on augmente seulement la quantité 

   if($position_produit !== false)
   {

    // on ajoute la quantité souhaité à celle existante pour le produit
    $_SESSION['panier']['quantite'][ $position_produit] += $quantite;

   }else
   {
    $_SESSION['panier']['id_produit'][] = $id_produit;

    
    $_SESSION['panier']['quantite'][] = $quantite;

    
    $_SESSION['panier']['prix'][] = $prix;
   }


 }

function totalPanier()
{

  $total = 0;

  for($i=0; $i <  count($_SESSION['panier']['id_produit']) ; $i++)
  {
     $total += $_SESSION['panier']['quantite'][$i] *  $_SESSION['panier']['prix'][$i];

     
  }
  return $total;
}

function retirerProduitPanier($id_produit)
{
  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);

  if($position_produit !== false)
  {

    //array_splice permet de retirer une ligne de chacun des tableaux (id_produit , quantete, et prix ) du panier a partir de la position trouvé et le nombre d'element est 1
    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);

    array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
    array_splice($_SESSION['panier']['prix'], $position_produit, 1);
  }

}

