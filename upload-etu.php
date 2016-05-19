<?php
	$fic=fopen($_FILES['fileUpload']['name'],'r');
	$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
	while (($data = fgetcsv($fic,",")) !== FALSE) {
		
		for($i=0;$i<16;$i++){
				$temp=rand(33,125);
				$tab[$i]=chr($temp);
		}
			
			
		$pass= implode($tab);
		
        $req = $bdd->prepare('INSERT INTO etudiants(ine,nom,prenom,site,email,status,mot_de_passe) VALUES(:ine,:nom,:prenom,:site,:email,"P",:pass)');
		$req->execute(array(
			'ine' => $data[2],
			'nom' => $data[0],
			'prenom' => $data[1],
			'email' => $data[4],
			'site' => $data[3],
			'pass' => $pass
			));
		
		for($i=0;$i<16;$i++){
			$temp=rand(33,125);
			$tab[$i]=chr($temp);
		}
		
    }
	
	fclose($fic);
	header('Location: liste-etudiants.php');
?>
