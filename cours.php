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
                <h1>Les Cours</h1>
                <p>Nos profs ont été choisis pour leur qualité pédagogique et leur rigueur. Ils sauront vous embarquer dans cette formidable aventure que constitue l’apprentissage ou le perfectionnement de la pratique guitaristique (jouer de la guitare quoi).</p>
                <img src="images/pic/cours.jpg" style="float:left;padding-right:20px;"/>
                <p>Les cours de guitares se déroulent dans des boxs adaptés et toujours près de l’atelier et du magasin pour pallier aux éventuels bobos se déroulant lors de la session de cours. Nous sommes toujours à vos côtés !</p>
                <p>Lors des cours de guitares, nous pouvons aussi vous proposer de vous prêter un instrument. Nous savons qu’il n’est pas toujours aisé de venir avec sa guitare. Bref, vous êtes mieux qu’à la maison dans notre magasin.</p>
                <img src="images/pic/cours2.jpg" style="float:right;padding-left:20px;"/>
                <p>Que vous commenciez avec une guitare classique, une folk ou sur une électrique il faut envisager l’apprentissage de la guitare sur plusieurs année. Mais chaque élève a son propre rythme de progression. Notre objectif  principal est que vous ressentiez tout le plaisir que peut procurer la pratique de la guitare.</p>
                <p>De la simple “tournerie” sur acoustique au plus débridé des shreds en passant par un bon delta blues, chaque style trouvera son prof à RockShop. Alors, prêt pour le plus merveilleux de voyage ?</p>
                <h2>Nous contacter</h2>
                <p>Pour obtenir un planning personnalisé et les tarifs, merci de nous contacter à l'adresse :<br/><a href="mailto:cours@hellguitars.fr">cours@hellguitars.fr</a></p>
                <p style="clear:both"></p> 
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