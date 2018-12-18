<?php
    session_start();
?>
<?php
if ( isset($_SESSION['user']) && ($_SESSION['user']=='admin')) {
// ----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion admin soit présente -
// ----------------------------------------------------------------
include('inc/cnx.inc.php');
try {
    //connexion à la base de données
    $connexion = new PDO($dsn,$user,$mdp);
    $req_val="SELECT * FROM `produits`";
    $traitement= $connexion->prepare($req_val);
    $traitement->execute();

    // On affiche alors le panel d'admin, soit tout le code ci-dessous
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
                <section class="secP">

                  <!-- menu -->
                  <nav>				
                    <?php
                            include_once('inc/menu.inc.php');
                    ?>
                  </nav>
                  <!-- fin du menu -->

                  <!-- contenu principale de la page -->
                  <article id="center">				
                    <h1>Panel d'administration: Afficher Les Produits</h1>
                    <table class='affiche_client'>
                    
                         <?php
                       while($val=$traitement->fetch()){
                        ECHO '<figure class="produit">
								<a href ="modifier/supP.php?idP='.$val[0].'"><img src="images/sup.png" style="height: 25px; width: 25px;margin-right: 0px;"></a>
							  '.$val[1].'<figcaption><hr/>
							  <form action="modifier/modP.php?idP='.$val[0].'" method="post">
							  
                                <label for="nom"><u>Nom du Produit : </u></label><br /><br />
                              <input type="text" name="nom" required autofocus maxlength="40" value="'.$val[1].'"/>
                                 
                                  
                                  <label for="desc"><u>Description du Produit : </u></label><br /><br />
                              <textarea type="text" name="desc" required autofocus maxlength="40"> '.$val[2].'</textarea>
                                  
                               <label for="prix"><u>Prix  du Produit : </u></label><br /><br />
                              <input type="text" name="prix" required autofocus maxlength="40" value="'.$val[3].'"/><br /><br />
							  
                                <input type="submit" value="Modifier" />
							  </form><br /><br /> 
							  </figcaption>
							</figure><br /><br /><br /><br />';
                        
                       }
                    ?>
                    <p style="clear:both" /> 
					<br />
					<br />
					<a href="adminpanel.php"><img src="images/retour.png" style="width:50px; height:50px;"/></a>
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
    catch (Exceptions $e){
    die($dsn."erreur : ". $e->getMessage());
}
}
else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>