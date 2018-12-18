


   
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
                   
                  </nav>
                  <!-- fin du menu -->

                  <!-- contenu principale de la page -->
                  <article id="center">       
                    <h1>Ajouter un service</h1>
                    <p>
                        <form action="enregistrerService.php" method="post" enctype="multipart/form-data">                                                            
                          <fieldset>
                              <legend>Ajout d'un service</legend>
                              <label for='nom_service'>nom du service</label>
                              <input type="text" name="nom_service" required autofocus maxlength="40"/><br/>
                                                                         
                              <label for='desc_service'>Description</label>
                              <input type="textarea" name="desc_service" required maxlength="400"/><br/>
                              <label for='prix'>Prix par heure</label>
                              <input type="number" name="prix" required maxlength="10"/><br/><br />  
                             
                              <label for='cat'>catégorie</label>
                              <SELECT name="cat" size="1">
                              <OPTION>équipement auto
                              <OPTION>équipement moto
                              <OPTION>meuble cuisine
                              <OPTION>meuble salon
                              <OPTION>accessoires
                              <OPTION>informatique
                              <OPTION>jeux
                              <OPTION>téléphonie
                              <OPTION>sport
                              <OPTION>jardinage
                              <OPTION>bricolage
                              <OPTION>animaux
                              <OPTION>musique
                              <OPTION> BTP
                              <OPTION>commerce
                              <OPTION>restauration
                              </SELECT>
                               <br/>
                                <label for='date'>disponible à partir du</label>
                              <input type="date" name="date" required maxlength="250"/><br/>
                              <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                              <br /><br /><input type="submit" value="Ajouter"/>
                          <input type="reset" value="Effacer"/>
                          </fieldset>
                  </form>
                    </p> 
          <br />
          <br />
          <a href="index.php"><img src="images/retour.png" style="width:50px; height:50px;"/></a>         
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
 

















