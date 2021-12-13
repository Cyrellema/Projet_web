<!DOCTYPE html>
<html>
<head>
    <link rel ="stylesheet" href="formulaire.css"/>
</head>
<?php
   $dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
   $username ='root';
   $password ='';
   $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>
<form action="http://localhost:8888/index.html" method="GET"> 
<body>
<label>Connexion
    <form action="localhost:8888/identification.php" method="GET">
        Login
        <input type="text" class="email" name="email" placeholder="email"/>
        Password
        <input type="motDePasse" id="mdp" class="motDePasse" name="motDePasse"  placeholder="password"/>
        <input type="submit" id="valider" class="validez" value="validez" />
    <?php
    if (isset($_REQUEST['email'], $_REQUEST['motDePasse'])){
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        
        $motDePasse = stripslashes($_REQUEST['motDePasse']);
        $motDePasse = mysqli_real_escape_string($conn, $motDePasse);
        $query = "INSERT into 'clients' (email, motDePasse) 
                    VALUES ('$email', '".hash('', $motDePasse)."')";
    }
?>
</label>
<a href="creation_compte.php">creation compte</a>
</html>