<html>
    <head>
        <title> Formulaire </title> 
        <meta charset="UTF-8"/>   
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Chercher des produits</title>
     <link rel="stylesheet" href="formulaire.css" />
    </head>

    <?php
    $dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
    $username ='root';
    $password ='';
    $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
    ?>

    <body>
        <center>
            <p><b>Chercher des produits</b></p></br>
            <div id="cherche">
            <form action="check_cherche.php" method="GET">
    
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
                </label><br>

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
                </label><br>

                <label> Prix maximum
                <input type="text" id="prix" class="prix" name="prix"/>
                </label><br>
                <input type="submit" id="valider" value="validez" class="validez"/>
            </form>
            </div>
        </center>
    </body>
</html>