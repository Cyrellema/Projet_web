<html>
  <head>
    <title> Liste des produits par catégorie et marque </title>
      <meta charset="UTF-8" />
  </head>
  <body>
    <?php
      $WHERE = "";
      $INFOS = "";
      foreach ($_GET as $nom => $valeur) {
       if ($valeur != "") {
           if ($WHERE == "") $WHERE .= " WHERE ";
           else              $WHERE .= " AND ";
           $WHERE .= "$nom='$valeur'";
           $INFOS .= "$nom='$valeur' ";
        }
      }
      echo "<h3> Liste des produits : $INFOS </h3>";    
      $sql = "SELECT * FROM produits $WHERE;";      
      echo $sql; /* Pour le déboguage */
      
      $dsn = 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=projet_web&table=produits&pos=0';
      $username = 'root';
      $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

      $sth = $dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll();

      echo "<ul>";
      foreach ($result as $enr) {
         echo "<li>".$enr['nom']." (".$enr['catégorie'].") de marque ".$enr['marque']." : ".$enr['prix']." euros</li>";
      }
      echo "</ul>";
    ?>
  </body>
</html>

