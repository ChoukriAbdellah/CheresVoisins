<?php
    session_start();
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
                <h1>vous chercher quelque chose de particulier?</h1><br />
                <table border='5'> 
                    <tr>
			
                    
                        <?php 
					

					      
              
			?>

                     <p style="clear:both" /> 
            </article>
              <div style="clear:both;height:40px"></div>
            <!-- fin du contenu principale -->
            
            </section>  
          <!-- fin partie principale --> 
          
          </div>  
        </div>  
             
        <form action="rechercheObjet.php" method="post" href="page.css">
<p>
    <label >Que chercher vous ?</label> <input type="text" name="recherche" id="recherche" class="champ"/>
   
    
    <input type="submit" value="chercher" />
</p>
</form>


 

      
	<!-- pied de page -->
        <div id="footerWrapper"> 
            <?php
                    include_once('inc/footer.inc.php');
            ?>
      
    </div> 
  </body>
  
</html>