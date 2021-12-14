<!DOCTYPE HTML>
<html>

<?php
function creationlignescommandes(){
    if(!isset($_SESSION['lignescommandes'])){
        $_SESSION['lignescommandes']=array();
        $_SESSION['lignescommandes']['idProduit'] = array();
      $_SESSION['lignescommandes']['quantite'] = array();
      $_SESSION['lignescommandes']['montant'] = array();
       }
   return true;
}
?>

<?php
function ajouterArticle($idProduit,$quantite,$montant){

//Si le lignescommandes existe
if (creationlignescommandes())// && !isVerrouille())
{
   //Si le produit existe déjà on ajoute seulement la quantité
   $positionProduit = array_search($idProduit,  $_SESSION['lignescommandes']['idProduit']);

   if ($positionProduit !== false)
   {
      $_SESSION['lignescommandes']['quantite'][$positionProduit] += $quantite ;
   }
   else
   {
      //Sinon on ajoute le produit
      array_push( $_SESSION['lignescommandes']['idProduit'],$idProduit);
      array_push( $_SESSION['lignescommandes']['quantite'],$quantite);
      array_push( $_SESSION['lignescommandes']['montant'],$montant);
   }
}
else
echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
* Modifie la quantité d'un article
* @param $libelleProduit
* @param $qteProduit
* @return void
*/
function modifierQTeArticle($idProduit,$quantite){
//Si le lignescommandesexiste
if (creationlignescommandes())// && !isVerrouille())
{
   //Si la quantité est positive on modifie sinon on supprime l'article
   if ($qteProduit > 0)
   {
      //Recharche du produit dans le lignescommandes

      $positionProduit = array_search($idProduit,  $_SESSION['lignescommandes']['idProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['lignescommandes']['quantite'][$positionProduit] = $quantite ;
      }
   }
   else
   supprimerArticle($idProduit);
}
else
echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
* Supprime un article du lignescommandes

* @param $libelleProduit
* @return unknown_type
*/
function supprimerArticle($idProduit){
//Si le lignescommandes existe
if (creationlignescommandes ()) //&& !isVerrouille())
{
   //Nous allons passer par un lignescommandestemporaire
   $tmp=array();
   $tmp['idProduit'] = array();
   $tmp['quantite'] = array();
   $tmp['montant'] = array();
   //$tmp['verrou'] = $_SESSION['lignescommandes']['verrou'];

   for($i = 0; $i < count($_SESSION['lignescommandes']['idProduit']); $i++)
   {
      if ($_SESSION['lignescommandes
      ']['idProduit'][$i] !== $idProduit)
      {
         array_push( $tmp['idProduit'],$_SESSION['lignescommandes']['idProduit'][$i]);
         array_push( $tmp['quantite'],$_SESSION['lignescommandes']['quantite'][$i]);
         array_push( $tmp['montant'],$_SESSION['lignescommandes']['montant'][$i]);
      }

   }
   //On remplace le lignescommandes en session par notre lignescommandes temporaire à jour
   $_SESSION['lignescommandes'] =  $tmp;
   //On efface notre lignescommandes temporaire
   unset($tmp);
}
else
echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
* Montant total du lignescommandes


function MontantGlobal(){
$total=0;
for($i = 0; $i < count($_SESSION['lignescommandes']['idProduit']); $i++)
{
   $total += $_SESSION['lignescommandes']['quantite'][$i] * $_SESSION['lignescommandes']['montant'][$i];
}
return $total;
}
*/


/**
* Fonction de suppression du lignescommandes

* @return void
*/
function supprimelignescommandes(){
unset($_SESSION['lignescommandes']);
}

/**
* Permet de savoir si le lignescommandes
 est verrouillé
* @return booleen

function isVerrouille(){
if (isset($_SESSION['lignescommandes']) && $_SESSION['lignescommandes']['verrou'])
return true;
else
return false;
}
*/

/**
* Compte le nombre d'articles différents dans le lignescommandes

* @return int
*/
function compterArticles()
{
if (isset($_SESSION['lignescommandes']))
return count($_SESSION['lignescommandes']['idProduit']);
else
return 0;

}

?>




</html>
