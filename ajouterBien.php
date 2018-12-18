


   
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
                    <h1>Vous avez des objets inutilsés ?</h1>
                    <p>
                        <form action="enregistrerBien.php" method="post" enctype="multipart/form-data">                                                            
                          <fieldset>
                              <legend>Ajout d'un objet</legend>
                              <label for='nom_bien'>nom du bien</label>
                              <input type="text" name="nom_bien" required autofocus maxlength="40"/><br/>
                                                                         
                              <label for='desc_bien'>Description</label>
                              <input type="textarea" name="desc_bien" required maxlength="400"/><br/>
                              <label for='prix'>Prix du Produit</label>
                              <input type="number" name="prix" required maxlength="10"/><br/><br />  
							               
                              <label for='cat'>catégorie</label>
                              <SELECT name="cat" size="1">
                              <OPTION>équipement auto
                              <OPTION>équipement moto
                              <OPTION>meuble cuisine
                              <OPTION>meuble salon
                              <OPTION>accessoirs
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
							                <label> image</label>
						                	<input type="file" name="image">
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
 

















