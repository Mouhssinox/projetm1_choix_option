<?php 
session_start();
Session_destroy();
unset($_SESSION["identifiant"]);
unset($_SESSION["motdepasse"]);
		header('Location:login.php');


?>

