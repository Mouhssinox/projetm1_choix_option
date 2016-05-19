# INSTALLATION 

1. Télécharger le projet et le mettre dans un dossier déstiner à localhost *(htdocs enx lammp)*
2. Créer un base de donnée nommé **projetm1**
3. Importer la base de donnée dans cette base, sur phpadmin, en important le fichier **projetm1.sql**
4. L'installation est fini :)
  * vous pouvez allez à la page login.php du projet *(en localhost)*


# UTILISATION
*L'authentification* peut se faire par un administrateur ou un etudiant 

#### 1. Administrateur:

		
  * pour se connecter : 
    * login: admin
    * mot de passe: admin

  * pour consulter la liste des étudiants: aller dans parcours -> Liste L3. Une fois arriver sur la liste des étudinats:
   * ajouter un étudiant:
		* click sur le bouton __+__ 
   * importer des étudiant via un fichier __csv__ :
   		* click sur le bouton attaché(trombone)
   		* le format du fichier csv est le suivant:
    		* __nom,prenom,numero,site,e-mail__
   * pour __supprimer__ un étudiant:
   		* cliquer sur le bouton corbeille
   * pour __modifier__ l'information d'un étudiant:
   		* cliquer sur le bouton crayon
		* ! si l'étudiant est rédoublant, son nom apparaisse en vert et il y a un autre bouton qui apparait pour ajouter ou consulter les matières tenté ou validé par l'étudiant

   * pour consulter la liste des options: aller dans __parcours__ -> __Liste Options__. 
Une fois arriver sur la liste des options:
		* ajouter options:
    		* cliquer sur le bouton __+__ 
		* pour __supprimer__ un option
    		* cliquer sur le bouton corbeille
		* pour __modifier__ un option
    		* cliquer sur le bouton crayon
   * pour __consulter__ les voéux des étudiants:
	  * aller dans requettes des étudiants
   * pour __lancer l'algorithme__ d'affectation
	  * aller dans requettes des étudiants-> cliquer sur le bouton "cliquer pour lancer l'affectation"
	  * pour consulter le __resultat__ de l'affectation
	  * aller dans résultat d'affectation

#### 2. Etudiant:
  * pour se connecter:
	  * login: ine de l'étudiant
	  * mot de passe: mot de passe générer dans la table étudiant de la base de donnée
  * les étudiants peut maintenant faire leur choix dans l'onglet __choix__
  * Il peut aussi modifier leur choix dans l'onglet __mes choix__
