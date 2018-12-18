<?php
    session_start();
?>
<?php
//Principe de fonctionnement :
//----------------------------
//Lorsque erreur.php est appelé, on doit lui passer en plus un paramètre
//dans l'URL nommé 'err'.
//Ce paramètre nous permettra de personnaliser le message d'erreur.
//$message doit contenir le message à afficher et
//$page_redirect contient la page vers laquelle renvoyer l'internaute après qq secondes


//$_GET['err'] permet de récupérer le paramètre contenu dans l'URL
switch($_GET['err']) {
    
    //l'erreur vient de la connexion d'un admin
    case "admin" :
        $message="Votre identifiant et/ou votre mot de passe d'administrateur sont invalides.";
        $page_redirect="sidentifieradmin.php";
        break;
    
    //l'erreur vient de la connexion d'un client
    case "client" :
        $message="L'adresse e-mail et/ou le mot de passe sont invalides.";
        $page_redirect="sidentifierclient.php";
        break;
    
    //l'erreur vient de 2 pwd différents lors de l'enregistrement d'un client
    case "pwd" :
        $message="Les deux mots de passe saisis doivent être identiques.";
        $page_redirect="nouveauclient.php";
        break;
        
    case "pwd_connecté" :
        $message="Les deux mots de passe saisis doivent être identiques.";
        $page_redirect="clientpanel.php";
        break;
    
    //l'erreur vient de l'enregistrement d'un client
    case "nouveauclient" :
        $message="Les informations transmises sont erronées.";
        $page_redirect="nouveauclient.php";
        break;
		
	//l'erreur vient du type de fichier uploader
    case "type_fichier" :
        $message="Vous devez uploader un fichier de type png, jpg, jpeg.";
        $page_redirect="ajout_produit.php";
        break;
		
	//l'erreur vient de la taille du fichier uploader
    case "taille_fichier" :
        $message="Le fichier est trop gros... (une taille limite est fixée à 100Ko)";
        $page_redirect="ajout_produit.php";
        break;
	//l'erreur vient de l'uploader
    case "upload" :
        $message="Echec de l'upload !";
        $page_redirect="ajout_produit.php";
        break;
		
	//l'erreur vient du Panier
    case "panier" :
        $message="Les informations transmises sont erronées.";
        $page_redirect="prod_electriques.php";
        break;
	//l'erreur vient de L'incription
    case "inscription" :
        $message="Les informations transmises sont erronées ou l'adresse Mail est déjà attribué.";
        $page_redirect="nouveauclient.php";
        break;
    
    // l'erreur n'est pas prévue, on retournera à l'accueil
        case "non_connecter" :
        $message="Pour profiter de nos services vous devez vous connecter.";
        $page_redirect="sidentifierclient.php";
        break;
        case "objet_consommé" :
        $message="vous avez déja ajouté cet objet dans le panier.";
        $page_redirect="panier.php";
        break;
        case "aucun_resultat" :
        $message="aucun resultat trouvé pour votre requete.";
        $page_redirect="prod_electriques.php";
        break;
        case "objet_en_cours_emprunt":
        $message="cet objet est déja en cours d'emprunt par un autre voisin.";
        $page_redirect="annonceOnline.php";
        break;


    default:
        $message="Erreur inconue. Retour à l'accueil";
        $page_redirect="index.php";
        break;
}
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
                <h1>Erreur</h1>
                <p class='erreur'><?php echo $message;?></p>
                <p><a href="javascript:history.back()">Cliquez ici</a> pour revenir à la page précédente ou patientez quelques secondes...</p>
                <?php header( "refresh:3;url=".$page_redirect);?>
                <p style="clear:both"></p> 
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