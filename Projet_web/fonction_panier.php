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
if (creationlignescommandes())
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




function modifierQTeArticle($idProduit,$quantite){
//Si le lignescommandesexiste
if (creationlignescommandes())
{
   if ($qteProduit > 0)
   {
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
echo "Un problème est survenu.";
}


function supprimerArticle($idProduit){
//Si le lignescommandes existe
if (creationlignescommandes ()) 
{
   $tmp=array();
   $tmp['idProduit'] = array();
   $tmp['quantite'] = array();
   $tmp['montant'] = array();

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
*/
function supprimelignescommandes(){
unset($_SESSION['lignescommandes']);
}

/**
* Compte le nombre d'articles différents dans le lignescommandes
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
