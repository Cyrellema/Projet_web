<!DOCTYPE html>
<html>
<?php
$dsn = 'mysql:host=localhost;dbname=projet_web;charset=UTF8';
   $username ='root';
   $password ='';
   $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>
        Login

        <input type="text" class="email" name="email" placeholder="email" />

        <br>

        Password
        <input type="motDePasse" id="mdp" class="motDePasse" name="motDePasse" placeholder="password"/>
        <input type="submit" id="valider" class="validez" value="validez" >

</html>
