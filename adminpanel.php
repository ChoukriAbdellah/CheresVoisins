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
                    <h1>Panel d'administration</h1>
                    <p>
                        <h3>Fonctionnalités à développer :</h3>                   
                        <ul>
                            <li>Le Clients</li>
                            <ol>
                                <a href="ajout_client.php"><li>Ajout de clients</li></a>
                                <a href="afficher_client.php" ><li>Afficher Tous Les Clients</li></a>
                            </ol><br />
                            
                           
                            <li>Les Catégories</li>
                            <ol>
                                <a href="ajout_categorie.php" ><li>Ajout de Catégories</li></a>
                              <a href="afficher_categorie.php" ><li>Afficher Toutes Les Catégories</li>  </a>
                            </ol><br />
                            <li>Les Produits</li>
                            <ol>
                             <a href="ajout_produit.php" ><li>Ajout de Produits</li></a>
                              <a href="afficher_produit.php" > <li>Afficher Les Produits</li> </a>
                            </ol>
                        </ul>
                    </p>                
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