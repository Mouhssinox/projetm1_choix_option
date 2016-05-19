<?php $bdd = new PDO('mysql:host=localhost;dbname=projetm1','root','');
                        $reponse = $bdd->prepare('select id_option from options as O , etudiants AS E where E.ine = :ine and O.id_option = E.option_valide');
                        $reponse->execute(array(
                        'ine' => 1 
                        ));
                      //  while($donne = $reponse->fetch()){
                        $donne = $reponse-> fetchColumn();
                       echo $donne;
                    
      ?>    