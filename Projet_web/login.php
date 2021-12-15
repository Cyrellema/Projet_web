<!doctype html> 
<html> 
<head> 
  <meta charset="UTF-8"> 
  <title>Login check</title> 
  <link rel="stylesheet" href="formulaire.css" />
  <link rel="stylesheet" href="nav.css">
</head> 
<body> 

<?php
    session_start();
    header("content-type:text/html;charset=utf-8");
    //connect database
    $con = mysqli_connect("localhost","root","","projet_web");
    if (!$con) {
        die("Fail Connect: " . mysqli_connect_error());
    }
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    //Compare email and password
    $sql = "SELECT * FROM clients WHERE email = '$id' AND motDePasse = '$pass'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num){
        // header("location:welcome.php");
        echo 'Login Successed';    
    }else{
        echo'Login failed';
    }
    mysqli_close($con);//close database
 ?>

</body>