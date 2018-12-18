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
                    <h1>Panel d'administration: Ajouter ûne nouvelle Catégorie</h1>
                    <p>
                        <form action="inc/enregistrementcategorie.inc.php" method="post">                                                            
                          <fieldset>
                              <legend>informations Sur La Catégorie</legend>
                              <label for='cat'>Nom</label>
                              <input type="text" name="cat" required autofocus maxlength="40"/><br/>
							  <input type="submit" value="Ajouter"/>
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
else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>