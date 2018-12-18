<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
    <title>cheresVoisins</title>
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
                <p>Venez proposer vos services ou biens à vos voisins en échange d'une remunération ;).</p>
                <h1>Tout le monde y gagne</h1>
                <p>CheresVoisins est un site qui vous permet de vous entre aider entre voisins.Si vous avez des objets dont vous vous servez plus alors pourquoi ne pas les louer à vos voisins ?</p>
                <p> Vous pouvez aussi proposer votre aide.</p>
                <img src="images/pic/voisin.jpeg" />
                
                <h1>Les Services</h1>
                <p>Mettez vos savoir faires au services de vos voisins afin de les aider en echange d'un moutant.</p>
                <img src="images/pic/aide.jpg" />
                <h2>louer vos biens</h2>
                <p>Vous pouvez mettre vos bien en location .</p>
                
                
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
