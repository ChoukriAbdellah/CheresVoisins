<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Hell Guitars</title>
    <link rel='stylesheet' type='text/css' href='style/style.css' /> 
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
              <h1>vous avez des objets inutilisés ?</h1>
              <p>louer les à vos voisins ;).</p>
              <p>
                  <form action="inc/enregistrementclient.inc.php?page=nouveauclient" method="post">                                                            
                          <fieldset>
                              <legend>informations sur le bien à louer</legend>
                              <label for='nom'>Nom</label>
                              <input type="text" name="nom" required autofocus maxlength="40"/><br/>
                                                                         
                              <label for='description'>description</label>
                              <input type="text" name="description" required maxlength="250"/><br/>
                              <label for='cat'>catégorie</label>
                              <SELECT name="cat" size="1">
                              <OPTION>véhicules
                              <OPTION>immobilier
                              <OPTION>vacances
                              <OPTION>multimédia
                              <OPTION>loisirs
                              <OPTION>Materiel pro
                              <OPTION>maison
                              <OPTION>mode
                              <OPTION>autres
                              </SELECT>
                               <br/>
                              <label for='pf'>prix neuf</label>
                              <input type="text" name="pf" required pattern="[0-9]{10}" maxlength="5"/><br/>
                              <label for='date'>disponible à partir du</label>
                              <input type="date" name="date" required maxlength="250"/><br/>

                              
                          </fieldset>
                          <fieldset>
                              <legend>informations suplémentaires</legend>
                              <label for='info'>information</label>
                              <input type="information" name="information" required maxlength="250"/><br/>
                              
                              <label></label>
                              <input type="submit" value="ajouter"/>
                              <input type="reset" value="Effacer"/>
                          </fieldset>                       
                  </form>
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
