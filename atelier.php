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
                <h1>L'Atelier</h1>
				<p>Hell Guitars est un magasin mais aussi un atelier réparation/lutherie. Nous pratiquons régulièrement depuis plusieurs années la réparation, l’entretien et le réglage de vos instruments.Du recordage de votre instrument dans les règles de l’art à la pose d’un micro sur votre folk, nous nous occupons de répondre à vos envies en vous proposant des solutions adaptées à vos exigences dans des délais brefs.Notre atelier et réputé pour le sérieux et la rigueur de ses actes. Un carnet de suivi entretien permet à notre atelier de conserver un historique sur les instruments, leurs révisions et leurs spécificités.</p>
				<img src="images/pic/atelier.jpg"/>
				<p>La plupart des travaux ne nécessite pas la prise de rendez-vous, vous pouvez nous apporter votre instrument et le récupérer le lendemain ou le sur-lendemain dans le pire des cas.</p>				
				<p>Voici la liste non exhaustive des prestations proposées par notre atelier :
					<ul>
						<li>Recordage tous types de guitares et basses</li>
						<li>Nettoyage complet de votre instrument</li>
						<li>Pose de tous types de micros</li>
						<li>Changement d’ accastillage</li>
						<li>Re-cablage complet</li>
						<li>Révision complète</li>
						<li>...</li>
					</ul>
				</p>
				<h2>Nous contacter</h2>
				<p>Pour obtenir un devis personnalisé, merci de nous contacter à l'adresse :<br/><a href="mailto:atelier@hellguitars.fr">atelier@hellguitars.fr</a></p>
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