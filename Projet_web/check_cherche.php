<html>
  <head>
    <title> Résultats de recherche</title>
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="formulaire.css" />
  </head>
  <body>
     <table align=center border="1" cellspacing="0" width="100%">
        <tr>
            <td >ID</td>
            <td>CATEGORIE</td>
            <td>NOM</td>
            <td>DESCRIPTIF</td>
            <td>MARQUE</td>
            <td>PRIX</td>
            <td>STOCK</td>
            <td>PHOTO</td>
            <td>ACHETER</td>
        </tr>
    <?php
      $WHERE = "";
      $INFOS = "";
      
      foreach ($_GET as $nom => $valeur) {
       if ($valeur != "") {
           if ($WHERE == "") $WHERE .= "WHERE ";
           else              $WHERE .= " AND ";
           $WHERE .= "$nom='$valeur'";
           $INFOS .= "$nom='$valeur' ";
        }
      }
  
      echo "<h3> Résultats de recherche : $INFOS </h3>";    
      $sql = "SELECT * FROM produits $WHERE";      
      

      $dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
      $username = 'root';
      $password = '';
      $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

      $sth = $dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll();

             
      foreach ($result as $enr) {
        ?>
     <tr>
        <td><?PHP echo($enr['idProduit']); ?></td>
        <td><?PHP echo($enr['catégorie']); ?></td>
        <td><?PHP echo($enr['nom']); ?></td>
        <td><?PHP echo($enr['descriptif']); ?></td>
        <td><?PHP echo($enr['marque']); ?></td>
        <td><?PHP echo($enr['prix']);?></td>
        <td><?PHP echo($enr['stock']); ?></td>
        <td><img src="<?PHP echo($enr['img'])?>" height="200" width="200">; </td>
        <td><a href="#">AJOUTER PANNIER</a>
    </tr>
    <?php
    }
    
    ?>
  </body>
</html>


