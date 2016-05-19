<?php
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		$req = $bdd->prepare('INSERT INTO options_ouvertes(nom_opt,site_opt,max_etu_opt,id_option) VALUES(:nomOption,:siteOption,:maxEtudiant,:idf_option)');
		$sites= implode(',',$_POST['Sites']);
		$req->execute(array(
			'nomOption' => $_POST['Nom'],
			'siteOption' => $sites,
			'maxEtudiant' => $_POST['Maximum'],
			'idf_option' => $_POST['Id_Option']
			));
	header('Location: option_S6.php');
		
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	
	 

?>