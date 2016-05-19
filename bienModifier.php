<?php
SESSION_START();

if (isset($_POST['ok'])) {




                          
	
	try
	{
			if(empty($_POST["Sites"])){
                            //echo "<script> alert'oops' ;</script>";
							header('Location: modificaton-option_S6.php?numero='.$_POST["IdOption"].'');
                          }
                          else{
                            
		$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
		$sql="UPDATE options_ouvertes SET nom_opt=:nomOption,site_opt=:siteOption,max_etu_opt=:maxEtudiant,id_option=:idf_option WHERE id_option=:idf_option";
		$req = $bdd->prepare($sql);
		$sites= implode(',',$_POST['Sites']);
		$req->execute(array(
			'nomOption' => $_POST['nomOption'],
			'siteOption' => $sites,
			'maxEtudiant' => $_POST['maxEtudient'],
			'idf_option' => $_POST['IdOption']
			));
	header('Location: option_S6.php');
		
	}
}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	
	 
}
	
?>