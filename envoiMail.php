<?php
	$destinataire = "bourieboux@gmail.com";
	echo "Ce script envoie un mail à $destinataire";
	mail($destinataire, "test email 1", "merci pour ton tutorial");
?>
