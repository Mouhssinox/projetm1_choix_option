<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		if(strcmp($_GET['action'],'insertion')==0)
		{
			for($i=0;$i<16;$i++){
				$temp=rand(33,125);
				$tab[$i]=chr($temp);
			}
			
			
			$pass= implode($tab);
			
			$req = $bdd->prepare('INSERT INTO etudiants(ine,nom,prenom,site,email,status,mot_de_passe) VALUES(:ine,:nom,:prenom,:site,:email,:status,:pass)');
			$req->execute(array(
				'ine' => $_POST['Numero'],
				'nom' => $_POST['Nom'],
				'prenom' => $_POST['Prenom'],
				'email' => $_POST['Email'],
				'status' => $_POST['Status'],
				'site' => $_POST['Site'],
				'pass' => $pass
				));
				/* initialiser le tirage aleatoire */
			
			
			$req = $bdd->prepare('INSERT INTO logetudiants VALUES(:ine,:mdp)');
			$req->execute(array(
				'ine' => $_POST['Numero'],
				'mdp' => $pass
				));
		}
		else if(strcmp($_GET['action'],'modification')==0)
		{
			
			$req = $bdd->prepare('UPDATE etudiants set ine = :ine,nom = :nom,prenom = :prenom,site = :site,email = :email,status = :status where ine='.$_GET['ine']);
			$req->execute(array(
				'ine' => $_POST['Numero'],
				'nom' => $_POST['Nom'],
				'prenom' => $_POST['Prenom'],
				'email' => $_POST['Email'],
				'site' => $_POST['Site'],
				'status' => $_POST['Status']
				));
			
		}
		else if(strcmp($_GET['action'],'ajout_option')==0)
		{
			if(strcmp($_POST['Option_valide'],'rien')==0)
			{
				$req = $bdd->prepare('UPDATE etudiants set option_valide = :opt_valide where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_valide' => null
					));
			}
			else
			{
				$req = $bdd->prepare('UPDATE etudiants set option_valide = :opt_valide where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_valide' => $_POST['Option_valide']
					));
			}
			if(strcmp($_POST['Option_tente_1'],'rien')==0)
			{
				$req = $bdd->prepare('UPDATE etudiants set option_tente_1 = :opt_tente_1 where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_tente_1' => null
					));
			}
			else
			{
				$req = $bdd->prepare('UPDATE etudiants set option_tente_1 = :opt_tente_1 where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_tente_1' => $_POST['Option_tente_1']
					));
			}
			if(strcmp($_POST['Option_tente_2'],'rien')==0)
			{
				$req = $bdd->prepare('UPDATE etudiants set option_tente_2 = :opt_tente_2 where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_tente_2' => null
					));
			}
			else
			{
				$req = $bdd->prepare('UPDATE etudiants set option_tente_2 = :opt_tente_2 where ine='.$_GET['ine']);
				$req->execute(array(
					'opt_tente_2' => $_POST['Option_tente_2']
					));
			}
			
		}
		header('Location: liste-etudiants.php');
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	
	 

?>
