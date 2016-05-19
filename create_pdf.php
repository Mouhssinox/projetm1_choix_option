<?php
	require('fpdf181/fpdf.php');

	if(isset($_GET['tout'])){
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,'Resultat de tout affectation',1,1,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(47.5,10,'nom',1,0,'C');
		$pdf->Cell(47.5,10,'prenom',1,0,'C');
		$pdf->Cell(47.5,10,'numero',1,0,'C');
		$pdf->Cell(47.5,10,"nom de l'option",1,1,'C');
		try
		{
			$pdf->SetFont('Times','',14);
			$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
			$reponse = $bdd->query('select resultats.ine,etudiants.nom as nom,prenom,options.nom as nom_opt 
			from resultats 
			join etudiants on resultats.ine=etudiants.ine
			join options on resultats.id_option=options.id_option
			order by etudiants.nom');
			while($donne = $reponse->fetch()){
				$pdf->Cell(47.5,7,$donne['nom'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['prenom'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['ine'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['nom_opt'],1,1,'C');
			}
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$pdf->Output('D','tout affectation',true);
	}
	else if(isset($_GET['site'])){
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,'Resultat affectation '.$_GET['site'],1,1,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(47.5,10,'nom',1,0,'C');
		$pdf->Cell(47.5,10,'prenom',1,0,'C');
		$pdf->Cell(47.5,10,'numero',1,0,'C');
		$pdf->Cell(47.5,10,"nom de l'option",1,1,'C');
		try
		{
			$pdf->SetFont('Times','',12);
			$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
			$reponse = $bdd->query('select resultats.ine,etudiants.nom as nom,prenom,options.nom as nom_opt 
												from resultats 
												join etudiants on resultats.ine=etudiants.ine
												join options on resultats.id_option=options.id_option 
												where etudiants.site='.$_GET['site'].' order by etudiants.nom');
			while($donne = $reponse->fetch()){
				$pdf->Cell(47.5,7,$donne['nom'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['prenom'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['ine'],1,0,'C');
				$pdf->Cell(47.5,7,$donne['nom_opt'],1,1,'C');
			}
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$pdf->Output('D','affectation_'.$_GET['site'],true);
	}
	else{
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,'Resultat affectation '.$_GET['nom'],1,1,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(63.3,10,'nom',1,0,'C');
		$pdf->Cell(63.3,10,'prenom',1,0,'C');
		$pdf->Cell(63.3,10,'numero',1,1,'C');
		try
		{
			$pdf->SetFont('Times','',12);
			$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
			$reponse = $bdd->query('select resultats.ine,nom,prenom from resultats join etudiants on resultats.ine=etudiants.ine where id_option='.$_GET['id'].' order by nom');
			while($donne = $reponse->fetch()){
				$pdf->Cell(63.3,7,$donne['nom'],1,0,'C');
				$pdf->Cell(63.3,7,$donne['prenom'],1,0,'C');
				$pdf->Cell(63.3,7,$donne['ine'],1,1,'C');
			}
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$pdf->Output('D','affectation_'.$_GET['nom'],true);
	}
	
?>
