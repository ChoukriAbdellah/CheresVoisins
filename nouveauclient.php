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
              <h1>S'inscrire sur Hell Guitars</h1>
              <p>Pour profiter de services personnalisés, commander en ligne, inscrivez-vous ci-dessous.</p>
              <p>
                  <form action="inc/enregistrementclient.inc.php?page=nouveauclient" method="post">                                                            
                          <fieldset>
                              <legend>informations personnelles</legend>
                              <label for='nom'>Nom</label>
                              <input type="text" name="nom" required autofocus maxlength="40"/><br/>
                              <label for='prenom'>Prénom</label>
                              <input type="text" name="prenom" required maxlength="20"/><br/><br />
                              <label for='age'>age</label>
                              <input type="int" name="age" required maxlength="3"/><br/><br />                                           
                              <label for='adresse'>Adresse</label>
                              <input type="text" name="adresse" required maxlength="40"/><br/>
                              <label for='cp'>Code postal</label>
                              <input type="text" name="cp" required pattern="[0-9]{5}" maxlength="5"/><br/>
                              <label for='ville'>Ville</label>
                              <input type="text" name="ville" required maxlength="40"/><br />
                          </fieldset>
                          <fieldset>
                              <legend>informations de connexion</legend>
                              <label for='mail'>Adresse e-mail</label>
                              <input type="mail" name="mail" required maxlength="50"/><br/>
                              <label for='pwd1'>Mot de passe</label>
                              <input type="password" name="pwd1" maxlength="32"/><br/>
                              <label for='pwd2'>Confirmez</label>
                              <input type="password" name="pwd2" maxlength="32"/><br/><br/>
                              <label></label>
                              <input type="submit" value="S'inscrire"/>
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
