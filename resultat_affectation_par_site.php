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
							<h3>Résultat affectation <?php print ('('.$_GET['site'].')') ?></h3>
						</div>
					</div>
					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
						
							<div class="x_title">
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<a <?php print ('href="create_pdf.php?site='.$_GET['site'].'"'); ?> ><i class="fa fa-file-pdf-o"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							
														
							<div class="x_content">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Prenom</th>
											<th>numero</th>
											<th>nom de l'option</th>
										</tr>
									</thead>
									<tbody>
										<?php
											try
											{
												$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
												$reponse = $bdd->query('select resultats.ine,etudiants.nom as nom,prenom,options.nom as nom_opt 
												from resultats 
												join etudiants on resultats.ine=etudiants.ine
												join options on resultats.id_option=options.id_option 
												where etudiants.site='.$_GET['site'].' order by etudiants.nom');
												while($donne = $reponse->fetch()){
													print '<tr>';
													print ('<td>'.$donne['nom'].'</td>');
													print ('<td>'.$donne['prenom'].'</td>');
													print ('<td>'.$donne['ine'].'</td>');
													print ('<td>'.$donne['nom_opt'].'</td>');
													print '</tr>';
												}
												
											}
											catch (Exception $e)
											{
												die('Erreur : ' . $e->getMessage());
											}
											?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
            </div>
			<!-- /corps -->
		</div>
	</div>
	
	<script src="js/bootstrap.min.js"></script><?php
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
							<h3>Résultat affectation <?php print ('('.$_GET['nom'].')') ?></h3>
						</div>
					</div>
					
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
						
							<div class="x_title">
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<a <?php print ('href="create_pdf.php?site='.$_GET['site'].'"'); ?> ><i class="fa fa-file-pdf-o"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							
														
							<div class="x_content">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Prenom</th>
											<th>numero</th>
										</tr>
									</thead>
									<tbody>
										<?php
											try
											{
												$bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
												$reponse = $bdd->query('select resultats.ine,nom,prenom from resultats join etudiants on resultats.ine=etudiants.ine where site='.$_GET['site']);
												while($donne = $reponse->fetch()){
													print '<tr>';
													print ('<td>'.$donne['nom'].'</td>');
													print ('<td>'.$donne['prenom'].'</td>');
													print ('<td>'.$donne['ine'].'</td>');
													print '</tr>';
												}
												
											}
											catch (Exception $e)
											{
												die('Erreur : ' . $e->getMessage());
											}
											?>
									</tbody>
								</table>
						</div>
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

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
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

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
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
