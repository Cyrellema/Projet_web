<!Doctype html> 
<html>
	<head>
		<title>Liste de commande</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="formulaire.css" />
	</head>
	<body>
		<?php
		header("Content-Type: text/html; charset=utf8");  
		session_start (); $id="${_SESSION["id"]}";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "projet_web";
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		mysqli_query($conn,"SET NAMES UTF8");

		$sql="SELECT * FROM commandes WHERE email='$id'";

		$result = $conn->query($sql);
		echo"<a href='panier.html' >Return</a><br>";
		if ($result->num_rows > 0) {
			echo"<table width='90%' border='0' align='center'>
			<tr>
			<th>idCommande</th>
			<th>ClientId</th>
			<th>dateCommande</th>
			<th>etat</th>
			</tr>";
			while($row= $result->fetch_array()) {
				echo"<tr>";
					echo "<td align='center'>{$row['idCommande']}</td>";
					echo "<td align='center'>{$row['email']}</td>";
					echo "<td align='center'>{$row['dateCommande']}</td>";
					echo "<td align='center'>{$row['etat']}</td>";
					echo"</tr>";
			}echo"</table>";
		} else {
			echo "0 result";
		}
		$conn->close();
		?>
	</body>
</html>