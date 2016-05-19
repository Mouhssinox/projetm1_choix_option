<?php
session_start();
if (isset($_POST["ok"])){
	$con = mysqli_connect("localhost", "root","","projetm1");
	if (mysqli_connect_errno()) {
			printf("Connection failed: %s\n", mysqli_connect_error());
			exit();
	}
	$result1 = mysqli_query($con,"SELECT * from admin where identifiant='".$_POST["identifiant"]."' and mdp='".$_POST["motdepasse"]."' ");
	$result2 = mysqli_query($con,"SELECT * from etudiants where ine='".$_POST["identifiant"]."' and mot_de_passe='".$_POST["motdepasse"]."' ");
	if ( $row = mysqli_fetch_row($result1)){
		$_SESSION["identifiant"]=$row[0];
		$_SESSION["motdepasse"]=$row[1];
		header('Location:accueil.php');
	}
	elseif($row = mysqli_fetch_row($result2)){
		$_SESSION["identifiantEtudiant"]=$row[0];
		$_SESSION["motdepasseEtudiant"]=$row[1];
		header('Location:choix.php');
	}
	else{  header('Location:login.php?msg=1'); }		
}
else{
	header('Location:login.php?msg=1');
}
?>

<html>
	<head>
		<title>Connecter-Vous</title>
	</head>
<body>

</body>
</html>