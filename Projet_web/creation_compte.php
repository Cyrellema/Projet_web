<html>
    <head>
        <title> Création d'un nouveau compte client </title>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Création de compte</title>
     <link rel="stylesheet" href="index.css" />
    </head>
<body>

<?php
   $dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
   $username ='root';
   $password ='';
   $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
     ?>

<form action="localhost:8888/formulaire.php" method="GET">

    <label>
    Création de compte
    <?php
    $AfficherFormulaire=1;
    if(isset($_POST['email'], $_POST['motDePasse']))
    {
        if(empty($_POST['email'])){
            echo "il faut remplir le champ";
        } 
        elseif(strlen($_Post['email'])>32){
            echo "l'email est trop long, ne dépassez pas 32 caractères.";
        } 
        elseif(empty($_POST['motDePasse'])){
            echo "il faut remplir le champ";
        } 
        elseif(mysql_num_rows(mysql_query($mysql, "Select * FROM clients WHERE email='" .$_POST['email']."'"))==1){
            echo "cet email est déjà utilisé";
        } 
        elseif(!mysql_query($mysql, "INSERT INTO clients SET email='".$_POST['email']."', motDePasse='".md5($_POST['motDePasse'])."'"));
            {
                echo "erreur".mysql_erro($mysql);
            } 
        }  
?>

</label>
    </body>
    </html>