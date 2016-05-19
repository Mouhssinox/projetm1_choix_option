<?php
	if(isset($_GET['action'])){
		if(strcmp($_GET['action'],'insertion')==0){
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
				$req = $bdd->prepare('INSERT INTO options(nom,site,maximum,numero_option) VALUES(:nom,:site,:maximum,:num_opt)');
				$sites= implode(',',$_POST['Sites']);
				$req->execute(array(
					'nom' => $_POST['Nom'],
					'site' => $sites,
					'maximum' => $_POST['Maximum'],
					'num_opt' => $_POST['Numero']
					));
				
				
				header('Location: listeOption.php');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
		else if(strcmp($_GET['action'],'modification')==0){
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
				$req = $bdd->prepare('update options set nom = :nom,maximum = :maximum where id_option = :id');
				$req->execute(array(
					'nom' => $_POST['Nom'],
					'maximum' => $_POST['Maximum'],
					'id' => $_GET['id']
					));
				
				header('Location: listeOption.php');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
		
		else if(strcmp($_GET['action'],'suppression')==0){
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
				$req = $bdd->prepare('DELETE FROM options WHERE id_option=:num');
				$req->execute(array(
					'num' => $_GET['id']
				));
	
				
				header('Location: listeOption.php');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
		
		
		
	}
	 

?>
