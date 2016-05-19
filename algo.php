<?php 
	
	/*********** schema du variable options *****************
	 * $options['nombre_type']
	 * $options['type_option']['nombre']
	 * $options['numero_option'][$i]=numero_option de $i 
	 * $otpions['id_option']['maximum']
	 * $otpions['id_option']['nombre_actuel']
	 * $otpions['id_option']['etudiants'][$i]['num']
	 * $otpions['id_option']['etudiants'][$i]['score']
	 * **********************************************/
	 /********** schema variable etudiants ******************
	  * $etudiants[$type_opt]['nombre']
	  * $etudiants[$i]['numero']
	  * $etudiants[$i][$type_opt]['current_option']
	  * $etudiants[$i][$type_opt][$i(choix)]['id'] -> pour chaque type(jeudi ou vendredi) => ordre de choix
	  * $etudiants[$i][$type_opt][$i(choix)]['score']
	  * *****************************************************/
	$options;
	$etudiants;
	
	
	/***************************************************
	 * *****recuperation des données de la base******* *
	 * *************************************************/
	 
	 function recuperation_options(){
		 global $options;
		 $bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		 try
			{
				/* recuperation nombre de type d'option */
				$reponse = $bdd->query('select count(distinct numero_option) from options');
				if($donne = $reponse->fetch())
					$options['nombre_type']=$donne['count(distinct numero_option)'];
				/* fin de recuperation nombre de type d'option */
				
				/* recuperation de numero_option */
				$indice=0;
				$reponse = $bdd->query('select distinct numero_option from options order by numero_option');
				while($donne = $reponse->fetch()){
					$options['numero_option'][$indice]=$donne['numero_option'];
					$indice++;
				}
				/* fin de recuperation*/
				
				/* recuperation nombre d'option par type */
				
				$reponse = $bdd->query('select count(distinct id_option) as nbr_opt,numero_option from options group by numero_option');
				while($donne = $reponse->fetch()){
					$options[$donne['numero_option']]['nombre']=$donne['nbr_opt'];
				}
				
				/* fin de recuperation nombre d'option par type */
				
				
				$reponse = $bdd->query('select distinct id_option,maximum from options');
				while($donne = $reponse->fetch()){
					$id_opt=$donne['id_option'];
					$max=$donne['maximum'];
					$options[$id_opt]['maximum']=$max;
					$options[$id_opt]['nombre_actuel']=0;
				}
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
	 }
	 
	 function recuperation_etudiants(){
		 global $etudiants;
		 $bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		try{
			/*recuperation du nombre des etudiants qui a fait le choix*/

			$reponse = $bdd->query('select numero_option,count(distinct ine) from choix_etudiant join options on choix_etudiant.id_option=options.id_option group by numero_option');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			while($donne = $reponse->fetch()){
				$etudiants[$donne['numero_option']]['nombre']=$donne['count(distinct ine)'];
			}
				
			/*fin de recuperation du nombre des etudiants qui a fait le choix*/
			
			/* recuperation des choix */
			
			
			$indice=0;
			$teste=0;
			$reponse = $bdd->query('select ine,choix_etudiant.id_option,numero_option,choix_etudiant,score from choix_etudiant join options on choix_etudiant.id_option=options.id_option order by ine,choix_etudiant');
			while($donne = $reponse->fetch()){
				if($teste>0){
					if($donne['ine']!=$etudiants[$indice]['numero'])
						$indice++;
				}
				$etudiants[$indice]['numero']=$donne['ine'];
				$etudiants[$indice][$donne['numero_option']]['current_option']=0;
				$etudiants[$indice][$donne['numero_option']][$donne['choix_etudiant']-1]['id']=$donne['id_option'];
				$etudiants[$indice][$donne['numero_option']][$donne['choix_etudiant']-1]['score']=$donne['score'];
				$teste++;
			}
			
			/* fin de recuperation des choix */
			
			
		}
		catch(Exception $e){
			die ('Erreur : '.$e->getMessage());
		}
	 }
	 
	/****************************************************
	 * ***fin de recuperation des données de la base*** *
	 * *************************************************/ 
	
	function etu_min_score($id_option){//return num du min et son score
		global $options;
		$min=$options[$id_option]['etudiants'][0];
		for($i=1;$i<$options[$id_option]['maximum'];$i++){
			if($min['score']>$options[$id_option]['etudiants'][$i]['score'])
				$min= $options[$id_option]['etudiants'][$i];
		}
		return $min;
	}
	 
		
	function switch_etudiant($new_etudiant,$old_etudiant,$id_option){
		global $options,$etudiants;
		for($i=0;$i<$options[$id_option]['maximum'];$i++){
			if($old_etudiant['num']==$options[$id_option]['etudiants'][$i]['num']){
				$options[$id_option]['etudiants'][$i]=$new_etudiant;
				break;
			}
		}
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		 try
			{
				
				$reponse = $bdd->query('select numero_option from options where id_option='.$id_option);
				if($donne = $reponse->fetch())
					$num_opt=$donne['numero_option'];	
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		for($i;$i<$etudiants[$num_opt]['nombre'];$i++){
			if($etudiants[$i]['numero']==$old_etudiant['num']){
				return $etudiants[$i];
			}
		}
	}
	
	
	function insert_etudiant($etudiant_to_add,$type_option){//ajout d'etudiants si il y a de la place
		global $options;
		$opt_etu = $etudiant_to_add[$type_option]['current_option'];
		$opt_courant = $etudiant_to_add[$type_option][$opt_etu]['id'];
		if($options[$opt_courant]['nombre_actuel']<$options[$opt_courant]['maximum'])
		{
			$nombre_actuel=$options[$opt_courant]['nombre_actuel'];
			$options[$opt_courant]['etudiants'][$nombre_actuel]['num']=$etudiant_to_add['numero'];
			$options[$opt_courant]['etudiants'][$nombre_actuel]['score']=$etudiant_to_add[$type_option][$opt_etu]['score'];
			$options[$opt_courant]['nombre_actuel']++;
			return true;
		}
		else
			return false;
		
	}

	/**** l'algo principale peut maintenant commencer *****/
	function exec_algo($type_option){
		global $etudiants,$options;
		for($etu=0;$etu<$etudiants[$type_option]['nombre'];$etu++){
			$current_etu=$etudiants[$etu];
			while(!insert_etudiant($current_etu,$type_option)){
				$num_option_courant=$current_etu[$type_option]['current_option'];
				$current_option_id=$current_etu[$type_option][$num_option_courant]['id'];
				$current_option_score=$current_etu[$type_option][$num_option_courant]['score'];
				$old_etudiant=etu_min_score($current_option_id);
				$new_etudiant['num']=$current_etu['numero'];
				$new_etudiant['score']=$current_option_score;
				if($old_etudiant['score']<$new_etudiant['score']){
					$current_etu = switch_etudiant($new_etudiant,$old_etudiant,$current_option_id);
				}
				else{
					$current_etu[$type_option]['current_option']++;
					if($current_etu[$type_option]['current_option']>=$options[$type_option]['nombre'])
						return false;
				}
			}
		}
		return true;	
	}
	
	/**** stocker les resultat de l'algo dans la base ****/
	
	function stockage(){
		global $options;
		
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		 try
			{
				
				$reponse = $bdd->query('select id_option from options');
				while($donne = $reponse->fetch()){
					$id_opt=$donne['id_option'];
					for($i=0;$i<$options[$id_opt]['nombre_actuel'];$i++){	
						$req = $bdd->prepare('insert into resultats values (:id_option,:ine)');
						$req->execute(array(
							'id_option' => $id_opt,
							'ine' => $options[$id_opt]['etudiants'][$i]['num']
						));
					}
				}	
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		
	}
	
	/**** fin de stockage ****/
	
	recuperation_options();
	recuperation_etudiants();
	
	
	for($type_opt=0;$type_opt<$options['nombre_type'];$type_opt++){
		if(exec_algo($options['numero_option'][$type_opt])){
			
		}
		else{
			header('Location:affectation.php?succes=false');
			exit();
		}
	}
	stockage();
	header('Location:resultat_tout_affectation.php?succes=true');
?>
