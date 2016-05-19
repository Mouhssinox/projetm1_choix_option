<?php
	$count = $_POST['nb'];
	$num = $_POST['num'];
	//if(isset($_POST['liste_nom'])){
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		
		$req = $bdd->prepare('INSERT INTO choix_etudiant VALUES(:ine,:id_option,:choix_etudiant,:score)');
		$req1 = $bdd ->prepare('select O.nom from options as O ,etudiants as E where (E.option_tente_1 = :id_option or E.option_tente_2 = :id_option) and E.ine = :ine and O.id_option = :id_option');
		
		$i = 1;
		while ($i <= $count)      
			{
				for ($j=1; $j <= 3 ; $j++) { 
						if ( isset($_POST['liste_op'.$i.'_'.$j] )){
							$selected_val = $_POST['liste_op'.$i.'_'.$j];  

				$req1->execute(array(
					'id_option' => $selected_val,
					'ine' => $num
					));
				$nbr=$req1->rowCount();
				if ($nbr==0){
					$token = rand(1000,10000);	
				}else {
					$token = rand(10001,11000);
				}
				$req->execute(array(
					'ine' => $num,
					'choix_etudiant' => $i,
					'id_option' => $selected_val,
					'score' => $token
					));
				header('Location: mes-choix.php'); 
						}
						    
						}
				$i++;
			}
			
?>
