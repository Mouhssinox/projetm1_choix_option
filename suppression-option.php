<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
	$req = $bdd->prepare('DELETE FROM options WHERE id_option=:num');
		$req->execute(array(
			'num' => $_GET['ine']
			));
	
	header('Location: listeOption.php');
	
?>