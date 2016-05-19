<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
	$req = $bdd->prepare('DELETE FROM logetudiants WHERE id=:num');
		$req->execute(array(
			'num' => $_GET['ine']
			));
	$req = $bdd->prepare('DELETE FROM etudiants WHERE ine=:num');
		$req->execute(array(
			'num' => $_GET['ine']
			));
	
	print ($_GET['ine']);
	header('Location: liste-etudiants.php');
	
?>