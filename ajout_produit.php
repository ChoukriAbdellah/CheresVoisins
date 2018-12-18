<?php
    session_start();
?>
<?php
// ----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion admin soit présente -
// ----------------------------------------------------------------

if ( isset($_SESSION['user']) && ($_SESSION['user']=='admin')) {
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
                    <h1>Panel d'administration: Ajouter ûn nouveau Produit</h1>
                    <p>
                        <form action="inc/enregistrementproduit.inc.php" method="post" enctype="multipart/form-data">                                                            
                          <fieldset>
                              <legend>Ajout d'un Produit</legend>
                              <label for='refProd'>refProd</label>
                              <input type="text" name="refProd" required autofocus maxlength="40"/><br/>
                              <label for='nomProd'>Nom du Produit</label>
                              <input type="text" name="nomProd" required maxlength="30"/><br/><br />                                           
                              <label for='descProd'>Description</label>
                              <input type="textarea" name="descProd" required maxlength="400"/><br/>
                              <label for='PUHTProd'>Prix du Produit</label>
                              <input type="number" name="PUHTProd" required maxlength="10"/><br/><br />  
                              <label for='categProd'>categProd</label>
							  <?php
							  include('inc/cnx.inc.php');
							try {
								//connexion à la base de données
								$connexion = new PDO($dsn,$user,$mdp);
								$req_aff="SELECT * FROM `categories`";
								$traitement= $connexion->prepare($req_aff);
								$traitement->execute();
								echo' <select name="categProd">';
								while($categ=$traitement->fetch()){
								echo '<option name="'.$categ[0].'">'.$categ[1].'</option>';
								}
								echo '</select>';
							?>
							<input type="file" name="image">
							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
							<br /><br /><input type="submit" value="Ajouter"/>
                          </fieldset>
                  </form>
                    </p> 
					<br />
					<br />
					<a href="adminpanel.php"><img src="images/retour.png" style="width:50px; height:50px;"/></a>					
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
    catch (Exceptions $e){
    die($dsn."erreur : ". $e->getMessage());
}
}
else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>