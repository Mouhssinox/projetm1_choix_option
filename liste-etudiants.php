<?php
SESSION_START();
if (isset($_SESSION["identifiant"]) && isset($_SESSION["motdepasse"])){

 
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentallela Alela! | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />


  <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  
  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="nav-md">
	<div class="container body">
	
		<div class="main_container">
		
			<div class="col-md-3 left_col">

				<div class="left_col scroll-view">

					<div class="navbar nav_title" style="border: 0;">
						<a href="accueil.php" class="site_title"><i class="fa fa-paw"></i> <span>OptionChoice</span></a>
					</div>
					<div class="clearfix"></div>

					  <!-- menu prile quick info -->
					<div class="profile_pic">
						<img src="images/user.png" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile">
						<div class="profile_info">
						  <span>Bienvenue,</span>   
			              <?php
			              echo "<h2>cher(e) : ".$_SESSION["identifiant"]."</h2>";
			              ?>
						</div>
					</div>
					  <!-- /menu prile quick info -->

					<div class="clearfix"></div>

				  <!-- sidebar menu -->
				  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

					<div class="menu_section">
					  <h3>General</h3>
					  <ul class="nav side-menu">
						<li><a href="accueil.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
						</li> 

						<li><a><i class="fa fa-bar-chart-o"></i> Parcours <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu" style="display: none">
								<li><a href="liste-etudiants.php">Liste L3</a>
								</li>
								<li><a href="listeOption.php">Liste Options</a>
								</li>
							</ul>
						</li>

						<li><a><i class="fa fa-edit"></i> Lancer les options <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu" style="display: none">
								<li><a href="option_S6.php"> Options de S6</a>
								</li>
							</ul>
						</li>
						
						<li><a><i class="fa fa-file-archive-o"></i> resultat d'affectation <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
								<li><a href="resultat_tout_affectation.php">tout les étudiants</a></li>
								<li><a>par options<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
									<?php
										try
										{
											$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
											$reponse = $bdd->query('select id_option,nom from options');
											while($donne = $reponse->fetch()){
												print('<li><a href=resultat_affectation_par_option.php?id='.$donne['id_option'].'&nom='.$donne['nom'].'>'.$donne['nom'].'</a></li>');
											}
										}
										catch (Exception $e)
										{
											die('Erreur : ' . $e->getMessage());
										}
									?>
									</ul>
								</li>
								<li><a>par site<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
									<?php
										try
										{
											$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
											$reponse = $bdd->query('select distinct site from etudiants');
											while($donne = $reponse->fetch()){
												print('<li><a href=resultat_affectation_par_site.php?site='.$donne['site'].'>'.$donne['site'].'</a></li>');
											}
										}
										catch (Exception $e)
										{
											die('Erreur : ' . $e->getMessage());
										}
									?>
									</ul>
								</li>
							</ul>
							
						</li>
						<li><a href='affectation.php'><i class="fa fa-list-ol"></i>requettes des etudiants</a></li>
					  </ul>
					</div>
					
				  </div>
				  <!-- /sidebar menu -->

				</div>
			</div>
			
			<!-- top navigation -->
			<div class="top_nav">

				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
						  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
						  <li class="">
							<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							 <?php echo $_SESSION["identifiant"];  ?>
							  <span class=" fa fa-angle-down"></span>
							</a>
							<ul class="dropdown-menu dropdown-usermenu pull-right">
							  <li><?php echo "<a href=\"destroy.php\" ><i class=\"fa fa-sign-out pull-right\"></i> Déconnexion </a>"; ?>
							  </li>
							</ul>
						  </li>
						</ul>
					</nav>
				</div>

			</div>
			<!-- /top navigation -->
			
			<!-- corps -->
			<div class="right_col" role="main">
			
				<div class="page-title">
					<div class="title_left">
						<h3>Liste d'etudiants de L3</h3>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					
						<div class="x_title">
							<ul class="nav navbar-right panel_toolbox">
								<li>
									<a data-toggle="modal" data-target="#ModalInsertion"><i class="fa fa-plus"></i></a>
									<div class="modal fade" id="ModalInsertion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Insertion étudiant</h4>
												</div>
												<div class="modal-body">
													<form method="post" action="insertion-etu.php?action=insertion" id="form-insertion" data-parsley-validate class="form-horizontal form-label-left">

														<div class="form-group">
														  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Numero">Numéro d'étudiant<span class="required">*</span>
														  </label>
														  <div class="col-md-6 col-sm-6 col-xs-12">
															<input type="text" id="Numero" name="Numero" required="required" class="form-control col-md-7 col-xs-12">
														  </div>
														</div>
														<div class="form-group">
														  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Nom<span class="required">*</span>
														  </label>
														  <div class="col-md-6 col-sm-6 col-xs-12">
															<input type="text" id="Nom" name="Nom" required="required" class="form-control col-md-7 col-xs-12">
														  </div>
														</div>
														<div class="form-group">
														  <label for="Prenom" class="control-label col-md-3 col-sm-3 col-xs-12">Prenom<span class="required">*</span></label>
														  <div class="col-md-6 col-sm-6 col-xs-12">
															<input id="Prenom" class="form-control col-md-7 col-xs-12" required="required" type="text" name="Prenom">
														 </div>
														 </div>
														 <div class="form-group">
														  <label for="Site" class="control-label col-md-3 col-sm-3 col-xs-12">Site<span class="required">*</span></label>
														  <div class="col-md-6 col-sm-6 col-xs-12">
															<input id="Site" class="form-control col-md-7 col-xs-12" required="required" type="text" name="Site">
														  </div>
														</div>
														  
														<div class="form-group">
															<label for="email">Email* :</label>
															<input type="email" id="email" class="form-control" name="Email" data-parsley-trigger="change" required />
														</div>
														
														
														<div class="form-group">
														  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status*:</label>
															<div>
																  Passant:
																  <input type="radio" class="flat" name="Status" id="statusP" value="P" checked="" required />
																  Redoublant:
																  <input type="radio" class="flat" name="Status" id="statusD" value="R" />
																  Ajac : <input type="radio" class="flat" name="Status" id="statusA" value="A" />
															</div>
														</div>
														
														<div class="ln_solid"></div>
														<div class="form-group">
														  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
															<button type="submit" class="btn btn-success">Submit</button>
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  </div>
														</div>

													</form>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li><a data-toggle="modal" data-target="#ModalUpload"><i class="fa fa-paperclip"></i></a></li>
								<div class="modal fade" id="ModalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title">Upload étudiants</h4>
											</div>
											<div class="modal-body">
												<form enctype="multipart/form-data" method="post" action="upload-etu.php" id="form-upload" data-parsley-validate class="form-horizontal form-label-left dropzone">
													<input name="fileUpload" type="file" class="btn btn-default"/>
													<div class="ln_solid"></div>
													<div class="form-group">
													  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
														<button type="submit" class="btn btn-success">Submit</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													  </div>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
							</ul>
							<div class="clearfix"></div>
						</div>
					
						<div class="x_content">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Numero</th>
											<th>Nom</th>
											<th>Prenom</th>
											<th>Site</th>
											<th>Mail</th>
											<th>Status</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											try
											{
												$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
												$reponse = $bdd->query('select * from etudiants');
												while($donne = $reponse->fetch()){
													if(strcmp($donne['status'],"R")==0)
													{
														print ('<tr style="color:green">');
													}
													else if(strcmp($donne['status'],"A")==0)
													{
														print ('<tr style="color:red">');
													}
													else
													{
														print ("<tr>");
													}
													print('<td>'.$donne['ine'].'</td>');
													print('<td>'.$donne['nom'].'</td>');
													print('<td>'.$donne['prenom'].'</td>');
													print('<td>'.$donne['site'].'</td>');
													print('<td>'.$donne['email'].'</td>');
													print('<td>'.$donne['status'].'</td>');
													if(strcmp($donne['status'],"R")==0)
													{
														print ('<td><a data-toggle="modal" href="#modal_modif_'.$donne['ine'].'"><i class="fa fa-pencil"></i></a><span>   </span><a data-toggle="modal" href="#modal_add_opt_'.$donne['ine'].'"><i class="fa fa-file"></i></a></td>');
													}
													else
														print ('<td><a data-toggle="modal" href="#modal_modif_'.$donne['ine'].'"><i class="fa fa-pencil"></i></a></td>');
													print ('<td><a href="suppression-etu.php?ine='.$donne['ine'].'"><i class="fa fa-trash"></i></a></td>');
													print ("</tr>");
												}
											}
											catch (Exception $e)
											{
												die('Erreur : ' . $e->getMessage());
											}
											?>
									</tbody>
								</table>
									<?php
											try
											{
												$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
												$reponse = $bdd->query('select * from etudiants');
												while($donne = $reponse->fetch()){
													print ('<div class="modal fade" id="modal_modif_'.$donne['ine'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">');
													?>
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Modification étudiant n° <?php print ($donne['ine']) ?></h4>
																</div>
																<div class="modal-body">
																	<form method="post" <?php print ('action="insertion-etu.php?action=modification&ine='.$donne['ine'].'"'); ?> data-parsley-validate class="form-horizontal form-label-left">

																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Numero">Numéro d'étudiant<span class="required">*</span>
																		  </label>
																		  <div class="col-md-6 col-sm-6 col-xs-12">
																			<input type="text"  name="Numero" value=<?php print ('"'.$donne['ine'].'"'); ?> required="required" class="form-control col-md-7 col-xs-12">
																		  </div>
																		</div>
																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Nom<span class="required">*</span>
																		  </label>
																		  <div class="col-md-6 col-sm-6 col-xs-12">
																			<input type="text"  name="Nom" value=<?php print ('"'.$donne['nom'].'"'); ?> required="required" class="form-control col-md-7 col-xs-12">
																		  </div>
																		</div>
																		<div class="form-group">
																		  <label for="Prenom" class="control-label col-md-3 col-sm-3 col-xs-12">Prenom<span class="required">*</span></label>
																		  <div class="col-md-6 col-sm-6 col-xs-12">
																			<input  class="form-control col-md-7 col-xs-12" value=<?php print ('"'.$donne['prenom'].'"'); ?> required="required" type="text" name="Prenom">
																		  </div>
																		</div>
																		
																		<div class="form-group">
																			  <label for="Site" class="control-label col-md-3 col-sm-3 col-xs-12">Site<span class="required">*</span></label>
																			  <div class="col-md-6 col-sm-6 col-xs-12">
																				<input id="Site" class="form-control col-md-7 col-xs-12" value=<?php print ('"'.$donne['site'].'"'); ?> required="required" type="text" name="Site">
																			  </div>
																		</div>
																		
																		<div class="form-group">
																			<label for="email">Email* :</label>
																			<input type="email"  class="form-control" value=<?php print ('"'.$donne['email'].'"'); ?> name="Email" data-parsley-trigger="change" required />
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status*:</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				  <select  name="Status" class="form-control" required>
																					  <option value="P">Passant</option>
																					  <option value="R">redoublant</option>
																					  <option value="A">AJAC</option>
																				</select>
																			</div>
																		</div>
																		
																		<div class="ln_solid"></div>
																		<div class="form-group">
																		  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
																			<button type="submit" class="btn btn-success">modifier</button>
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		  </div>
																		</div>

																	</form>
																</div>
															</div>
														</div>
													</div>
											<?php
												}
											}
											catch (Exception $e)
											{
												die('Erreur : ' . $e->getMessage());
											}
											?>
											<?php
											try
											{
												$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
												$reponse = $bdd->query('select * from etudiants where status="R"');
												$reponse_opt=$bdd->query('select * from options');
												$i=0;
												while($res = $reponse_opt->fetch()){
													$options_name[$i]=$res['nom'];
													$options_id[$i]=$res['id_option'];
													$i++;
												}
												while($donne = $reponse->fetch()){
													print ('<div class="modal fade" id="modal_add_opt_'.$donne['ine'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">');
													?>
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">ajout information des options</h4>
																</div>
																<div class="modal-body">
																	<form method="post" <?php print ('action="insertion-etu.php?action=ajout_option&ine='.$donne['ine'].'"'); ?> data-parsley-validate class="form-horizontal form-label-left">

																
																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12">option validé</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				  <select  name="Option_valide" class="form-control" required>
																					  <option value='rien'>-- rien --</option>
																					  <?php
																							for($j=0;$j<$i;$j++){
																								print ('<option value='.$options_id[$j].'>'.$options_name[$j].'</option>');
																							}
																						?>
																				</select>
																			</div>
																		</div>
																		
																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12">option tenté 1</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				  <select  name="Option_tente_1" class="form-control" required>
																					  <option value='rien'>-- rien --</option>
																					  <?php
																							for($j=0;$j<$i;$j++){
																								print ('<option value='.$options_id[$j].'>'.$options_name[$j].'</option>');
																							}
																						?>
																				</select>
																			</div>
																		</div>
																		<div class="form-group">
																		  <label class="control-label col-md-3 col-sm-3 col-xs-12">option tenté 2</label>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				  <select  name="Option_tente_2" class="form-control" required>
																					  <option value='rien'>-- rien --</option>
																					  <?php
																							for($j=0;$j<$i;$j++){
																								print ('<option value='.$options_id[$j].'>'.$options_name[$j].'</option>');
																							}
																						?>
																				</select>
																			</div>
																		</div>
																		
																		<div class="ln_solid"></div>
																		<div class="form-group">
																		  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
																			<button type="submit" class="btn btn-success">modifier</button>
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																		  </div>
																		</div>

																	</form>
																</div>
															</div>
														</div>
													</div>
											<?php
												}
											}
											catch (Exception $e)
											{
												die('Erreur : ' . $e->getMessage());
											}
											?>
						</div>
					</div>
            </div>
			<!-- /corps -->
		</div>
	</div>
	
	<script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <script src="js/custom.js"></script>

    <script>
    NProgress.done();
  </script>
	
	
</body>
<?php
}else {
header("location:login.php?msg=0");
}
?>
</html>
