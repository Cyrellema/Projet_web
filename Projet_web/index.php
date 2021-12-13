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
        <input type="motDePasse" id="mdp" class="motDePasse" name="motDePasse" onkeypress="return runScript(event)"  placeholder="password"/>
        <input type="submit" id="valider" class="validez" value="validez" >
        <script>
          document.getElementById("mdp")
          .addEventListener("keyup", function(event){
             event.preventDefault();
             if(event.keyCode === 13){
                document.getElementById("valider").click();
             }
          });
          </script>

</html>