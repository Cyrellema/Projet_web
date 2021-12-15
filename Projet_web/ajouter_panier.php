<!DOCTYPE html>
<html>
    <?php
      $dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
      $username = 'root';
      $password = '';
      $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

function ajouterArticle($idProduit, $nom, $prixProduit){

if (creationlignescommandes())
{
    $idProduit = isset($_GET['idProduit']);
    $nom = isset($_GET['nom']);
    $prixProduit = isset($_GET['prix']);
    $sql='SELECT idProduit, nom, prix from produits where idProduit = $idProduit, nom = $nom, prix = $prixProduit';
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(); 
    array_push( $_GET['lignescommandes']['idProduit'],$idProduit);
    array_push( $_GET['lignescommandes']['quantite'],$quantite);
    array_push( $_GET['lignescommandes']['montant'],$prixProduit);
    echo OK;
}
else
echo "Il y a un problème.";
}
?>
</html>