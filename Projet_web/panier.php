<!DOCTYPE html>
<html>
<?php
$dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
   $username ='root';
   $password ='';
   $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>
<?php
session_start();
include_once("fonction_panier.php"); //pour link avec les fonctions
?>

<form method = "post" action="panier.php">
<tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Libellé</td>
        <td>Quantité</td>
        <td>Prix Unitaire</td>
        <td>Action</td>
    </tr>

    <?php
    if (creationPanier())
        {
            $nbArticles=count($_SESSION[''])
        }




</html>