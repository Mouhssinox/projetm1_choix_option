<?php
	$fic=fopen($_FILES['fileUpload']['name'],'r');
	$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
	while (($data = fgetcsv($fic,",")) !== FALSE) {
        $req = $bdd->prepare('INSERT INTO options_ouvertes VALUES(:nom_opt,:site_opt,:max_etu_opt,:id_option)');
		$req->execute(array(
			'nom_opt' => $data[0],
			'site_opt' => $data[1],
			'max_etu_opt' => $data[2],
			'id_option' => $data[3]
			));
	
		for($i=0;$i<16;$i++){
			$temp=rand(33,125);
			$tab[$i]=chr($temp);
		}
		
		$pass= implode($tab);
		
		$req = $bdd->prepare('INSERT INTO logetudiants VALUES(:ine,:mdp)');
		$req->execute(array(
			'ine' => $_POST['Numero'],
			'mdp' => $pass
			));
    }
	
	fclose($fic);
	header('Location: option_S6.php');
?>