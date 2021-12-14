<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="index.css" />
</header>
<?php
$dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
   $username ='root';
   $password ='';
   $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>
<?php

    $email = "email";
    $idCommande = "idCommande";
    $dateCommande = "dateCommande";
    $etat = "etat";
    $montant = "montant";

?>

<tr>
<th>Client</th>
                <th>N°Commande</th>
                <th>Date</th>
                <th>Etat</th>
                <th>Montant</th>
             
            </tr>
            <tr>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td><?php echo $idCommande; ?></td>
 
                 
                <td><?php echo $dateCommande; ?></td>
                 
                 
                <td><?php echo $etat; ?></td>
                 
                 
                <td><?php echo $montant; ?></td>
                </tr>
</html>
