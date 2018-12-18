<?php
    session_start();
    $connexion = new PDO('mysql:host=localhost;dbname=cheresVoisins;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $l=$_SESSION['mail'];
     $req2= ' SELECT idC as adresse_client from UTILISATEUR where mailC="'.$l.'"';
    $personne=$connexion->query($req2);
     $ID_PERSONNE=$personne->fetch();
    $idClient = $ID_PERSONNE['adresse_client'];
                       
     $_SESSION['identifiant_client'] = $idClient;


//mise à jour de la base de donnée dés la connexion de l'utilisateur
//on supprime les objets en cours d'emprunt si leurs date de fin est suppérieurou égale  à la date du  jour

//on récupére la date du jour
$time = date("Y-m-d");

$requete_maj='DELETE from BIEN_CONSOMMER WHERE idBien_C in(
SELECT idBien_P FROM PROPOSE_BIEN WHERE DATE_fIN="'.$time.'" )';
$maj=$connexion->query($requete_maj);



?>
<?php
// -----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion client soit présente -
// -----------------------------------------------------------------

if ( isset($_SESSION['user']) && ($_SESSION['user']=='client')) {
    // Si la variable session 'user' a pour valeur 'client' :
    // on affiche alors le panel client, soit tout le code ci-dessous    
    ?>
    <!DOCTYPE html>
    <html lang="fr">
      <head>
            <meta charset="UTF-8">
        <title>Hell Guitars</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
      </head>
      <body>
        <div id="wrapper"> 
          <div id="bg"> 
            <div id="header"></div>         
            <div id="page"> 
              <div id="container"> 

              <!-- bannière -->  
                <div id="banner"></div>  
              <!-- fin bannière -->  

              <!--  partie principale -->  
                <section>

                  <!-- menu -->
                  <nav>				
                    <?php
                        include_once('inc/menu.inc.php');
                    ?>
                  </nav>
                  <!-- fin du menu -->

                  <!-- contenu principale de la page -->
                  <article id="center">				
                    <h1>Espace client</h1>
                    
<?php
// --------------
//  Add by juju -
// --------------

//On inclut les paramètres de connexion à la bd
include('inc/connexionBDD.php');

try {
    //connexion à la base de données
    //$connexion = new PDO($dsn,$user,$mdp);
    
    //la requete compte le nb de ligne correspondant au couple login/mdp
    $req = "select * from UTILISATEUR where idC=:p;";
    
    //préparation de la requete
    $traitement = $connexion->prepare($req);
    
    //liaison des marqueurs avec les valeurs saisies dans le formulaire
    $traitement->bindparam(':p', $idClient);
    
    //execution de la requete préparée
    $traitement->execute();
    
    //j'extrait la première ligne du résultat contenu dans l'objet $traitement
    //en utilisant sa méthode fetch(). Elle renvoie TRUE si il ya bien un résultat
    //et FALSE s'il n'y a aucun résultat
   // if ($ligne=$traitement->fetch()) {
        //alors il y a bien 1 résultat
  $ligne=$traitement->fetch();
	   echo(
		"<fieldset>
                              <legend><u>Voir ses infos personnelles</u></legend>
		NOM : " . $ligne["nomC"] . "<br/>Prénom : " . $ligne["prenomC"] . "<br/>Adresse : " . $ligne["adresseC"] . " " . $ligne["cpC"] . " " . $ligne["villeC"] . "<br/>Mail : " . $ligne["mailC"]."</fieldset>");
       // }
   // else {
      //  echo("Erreur : s313c7");
       // }
		
		
		
		
		
		
		
		
		 echo '<form action="modificationClient.php" method="post">';
		echo"
						<fieldset>
                              <legend><u>Modification des infos personnelles</u></legend>
                              <label for='nom'>Nom</label>
                              <input type='text' name='nom' value =".$ligne[1]."/><br/>
                              <label for='prenom'>Prénom</label>
                              <input type='text' name='prenom' value =".$ligne[2]." /><br/><br />                                           
                              <label for='adresse'>Adresse</label>
                              <input type='text' name='adresse' value =".$ligne[3]." /><br/>
							  <input type='submit' value=Modifier />
                          </fieldset></form>";
					 echo '<form action="modificationMdp.php" method="post">';

						  echo"
						<fieldset>
                              <legend><u>Modification du Mot De Passe</u></legend>
                              <label for='mdp'>Mot de passe</label>
                              <input type='password' name='mdp' required value =".$ligne[7]." /><br/>
							  <label for='mdp2'>Confirmer Mot de passe</label>
                              <input type='password' name='mdp2' required value =".$ligne[7]." /><br/>
							  <input type='submit' value=Modifier />
                          </fieldset></form>";
    }
catch (PDOException $e){
    die("Source : ".$DSN." Erreur : ".$e->getMessage());
}

// --------------
//  Add by juju -
// --------------

?>
                    <p style="clear:both" /> 		
                  </article>
                  <div style="clear:both;height:40px"></div>
                <!-- fin du contenu principale -->

                </section>  
              <!-- fin partie principale --> 

              </div>  
            </div>  

            <!-- pied de page -->
            <div id="footerWrapper"> 
                <?php
                    include_once('inc/footer.inc.php');
                ?>
            </div> 
            <!-- fin pied de page -->

          </div> 
        </div> 
      </body>
    </html>
    <?php
}
else {
    // sinon : la variable session user n'est pas défini ou différente de 'client'
    header('location:index.php');
}
?>