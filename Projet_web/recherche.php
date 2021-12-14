<html>
    <head>
        <title> Formulaire </title> 
        <meta charset="UTF-8"/>   
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Formulaire </title>
     <link rel="stylesheet" href="formulaire.css" />
    </head>

<?php
$dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
$username ='root';
$password ='';
$dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
  ?>

    <body>
    <form action="http://localhost:8888/listeProduits.php" method="GET">
    <form>
<label> Marque 
    <select name='marque'>
       <?php 
       $sql="select distinct marque from produits;";
       $res=$dbh->query($sql);
       foreach($res as $enr){
          echo"<option>".$enr['marque']."</option>";
       }
       ?>
    </select>
    </label>
    <label> Catégorie
    <select name="catégorie">
       <?php
       $sql="select distinct catégorie from produits;";
       $res=$dbh->query($sql);
       foreach($res as $enr){
          echo"<option>".$enr['catégorie']."</option>";
       }
       ?>
    </select>
    </label>
    <label> Prix maximum
    <input type="text" id="prixMax" class="prixMax" name="prix maximum"/>
      <input type="submit" id="valider" value="validez" class="validez"/>
    <select name="prix maximum">
    <?php
    if (isset($_POST['prix'])){
       $sql='select produits from produits where prix <="'.$_POST['prix'].'"';
       $req = mysql_query($sql);
       $data=mysql_fetch_array($req);
       mysql_free_result($req);
       mysql_close();
       echo $data['resultats']; 
    }
    else{
       echo 'aucun produits';
    } 
    ?>
    </label>
    </form>
    </body>
</html>
