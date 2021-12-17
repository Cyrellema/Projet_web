<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>creation_compte</title> 
</head> 
<body> 
  <?php   
    session_start();
    $id=$_POST["id"];//get the id from html(post)
    $pass=$_POST["pass"];//get the password from html（post） 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";
    $con = new mysqli($servername, $username, $password, $dbname);
        if (!$con) { 
          die('Connection Fail'.$mysql_error()); 
        } 
        
    $dbid=null; 
    $dbpass=null;
	  $sql = "SELECT * FROM clients where email ='$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0){
      while ($row = $result->fetch_array()) { 
        $dbid=$row["email"]; 
        $dbpass=$row["motDePasse"];  
  }
}
    if(!is_null($dbid)){ 
  ?> 

  <script type="text/javascript"> 
    alert("Email Used, Please try again"); 
    window.location.href="creation_compte.html"; 
  </script> 

  <?php  
    }
	  $sql = "INSERT INTO clients(email,motDePasse,nom,prenom,adresse,telephone) VALUES ('$id','$pass','','','','')";
    
    if ($con->query($sql) === TRUE) {
      echo "Register Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $con->close();  //close database  
  ?> 

  <script type="text/javascript"> 
    alert("Register Successfully"); 
    window.location.href="login.html"; 
  </script> 
</body> 
</html>