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
                            include_once('inc/cnx.inc.php');
                    ?>
              </nav>
              <!-- fin du menu -->
             
            <!-- contenu principale de la page -->
            <article id="center">
                <h1> Basses</h1><br />
                <table border='5'> 
                    <tr>
			<td>Référence</td>
			<td>Nom</td>
			<td>Description</td>
                        <td>Image</td>
                    </tr>
                    
                        <?php
					try
					{
                                            $connexion=new PDO($dsn,$user,$mdp); //on se connecte à la base de donnée.
                                            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //on affiche ça pour voir les erreurs de PDO.
					}
					catch(PDOException $e) //si ça ne fonctionne pas on va "attraper" l'erreur.
					{
                                            die($dsn."erreur :".$e->getMessage()); //on arrete la connexion de la var $dsn.
					}

					$req = 'SELECT refProd,nomProd,descProd,PUHTProd, categProd  FROM produits,categories WHERE categories.idCateg=produits.categProd AND libCateg="Basses"'; //requete SQL pour recuperer les informations dans la bdd.
					$reponse = $connexion->query($req); //$reponse prendra le resultat de la requete SQL contenue dans la var $req.
					
					//le fetch sert a organiser les données en tableau.
					while ($ligne=$reponse->fetch())
					{
						echo "<tr>";
						echo "<td>".$ligne['refProd']."</td>";
						echo "<td>".$ligne['nomProd']."</td>";
						echo "<td>".$ligne['descProd']."</td>";
                                                echo "<td><img src=\"images/prod/".$ligne['refProd'].".jpg\"><br>";// ici les images ont comme nom de fichier la référence du produit pour plus de facilité.
                                                echo "Prix : ".$ligne['PUHTProd']*1.20 ." € "; // ont multiplie le contenue de la variable par 1,20 pour y ajouter le taux de tva de 20%
                                                //teste savoir si l'utilisateur de la page est client.
                                                if (isset($_SESSION['user']))
                                                {
                                                    // 4 lignes dessous : permet d'ajotuer le bouton "+ panier".
                                                   echo  "<a href='inc/panier.inc.php?act=ajouter&prod=".$ligne['refProd']."'> <button value='Ajouter_Panier'> + Panier </button></a>";
                                                }  
					}
                                         echo"</tr>";
					echo "<td></table>";
			?>
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