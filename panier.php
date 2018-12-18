<?php
    session_start();

$idClient = $_SESSION['identifiant_client'] ;

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
	<meta charset="UTF-8">
    <title>Hell Guitars</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
	<script type="text/javascript" src="scripts/scriptsJS.js"></script>

  </head>
  <body onload='Prixttc();'>
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
                <h1> Panier</h1><br />
                        <?php
					try
					{
                                            include('inc/connexionBDD.php'); //on se connecte à la base de donnée.
                                            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //on affiche ça pour voir les erreurs de PDO.
						//var_dump($_SESSION['panier']);
						echo'<h4 style="margin: 0;"></h4> <hr>';
						echo"<table class='Aff_table'> <th>Photo</th> <th>nom</th> <th> </th> <th>PRIX €</th>";
						$controle= 'SELECT COUNT(*) AS NB_BIEN  FROM BIEN_CONSOMMER WHERE IDUSER_C= "'.$_SESSION['identifiant_client'].'"';
						$resultat=$connexion->query($controle);
        				$ligne=$resultat->fetch();
       					 $NB_BIEN_CONSOMMER=$ligne['NB_BIEN'];
       					 
						if($NB_BIEN_CONSOMMER>0)
						{


								$tva=1.2;
								$requete='SELECT `idBien`,`nom`,ROUND((`PRIxNeuf`/200)*"'.$tva.'",2) as teste,`nom`,`description`,`categorie` FROM `BIEN`, `BIEN_CONSOMMER`, `UTILISATEUR` WHERE idBien=idBien_C  AND idc=IDUSER_C AND idC= "'.$_SESSION['identifiant_client'].'"';
								$reponse = $connexion->query($requete); //$reponse prendra le resultat de la requete SQL contenue dans la var $requete.
								
									
								
								while ($ligne=$reponse->fetch())
								{
									
									
									echo"<tr><td> <img  style='zoom: 40%;height: 200px;width: 200px;' src='images/prod/".$ligne['idBien'].".jpg'/></td>";

									echo"<td width=50%> <h5>".$ligne['nom']."</h5><p>".$ligne['description']."</p></td>";
									echo"<td><p>".$ligne['teste']." </p></td>";
									
								}
								echo"</tr>";
								
							}
						
						else
						{
							echo'<tr> <td colspan="4" style="text-align:center;">le Panier est vide </td></tr>';
						}


						//service

						$controle= 'SELECT COUNT(*) AS NB_SERVICE  FROM SERVICE_CONSOMMER WHERE IDUSER_C= "'.$_SESSION['identifiant_client'].'"';
						$resultat=$connexion->query($controle);
        				$ligne=$resultat->fetch();
       					 $NB_SERVICE_CONSOMMER=$ligne['NB_SERVICE'];
       					 
						if($NB_SERVICE_CONSOMMER>0)
						{


								$tva=1.2;
								$requete='SELECT `IDSERVICE`,`nom`,ROUND((`PRIX`/200)*"'.$tva.'",2) as teste,`description`,`categorie` FROM `SERVICE`, `SERVICE_CONSOMMER`, `UTILISATEUR` WHERE IDSERVICE=IDSERVICE_C  AND idc=IDUSER_C AND idC= "'.$_SESSION['identifiant_client'].'"';
								$reponse = $connexion->query($requete); //$reponse prendra le resultat de la requete SQL contenue dans la var $requete.
								//a faire 
								//echo'<h4 style="margin: 0;">service</h4> <hr>';	
								
								while ($ligne=$reponse->fetch())
								{
									
									echo"<tr><td> </td>";
									

									echo"<td width=50%> <h5>".$ligne['nom']."</h5><p>".$ligne['description']."</p></td>";
									echo"<td><p>".$ligne['teste']." </p></td>";
									
								}
								echo"</tr>";
								
							}
						
						else
						{
							echo'<tr> <td colspan="4" style="text-align:center;">le Panier est vide </td></tr>';
						}

						//service
						echo"</table>";
						echo'<br /><br /><br /><button style="float: left; border: none; background-color:black; color:white; " onclick="document.location = \'inc/panier.inc.php?act=vider\'">Vider Mon Panier</button>';
						echo"<br /><br /><br /><br /><br /> <h4 style='margin: 0;'>MON CODE DE PROMOTION </h4> <hr>";
						echo"<span>Si l'un des produits de votre panier bénéficie d'un code promotionnel, renseignez-le ici et cliquez sur ok (limité à 1 code de promotion par commande uniquement). 
							Code promotionnel non cumulable avec d'autres promotions en cours sur les produits.</span> <br /><br /> <button style='float: right; margin-left:10px;' onclick='Prixttc()'> OK </button>
							<input id='CodePromo' type='text' placeholder='code de promotion' style='float: right;padding-left:5px;'/> 
							 ";
					
						
						echo "<br><td><h4 style='margin: 0;'>PRIX TOTAL </p></td>";

						$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$prix=0;
						$variable='SET @nb=0';
						$requete_TOTAL_PRIX=' CALL prix_total("'.$idClient.'","'.$variable.'")';
						if(!$connexion->query('SET @nb=0') || !$connexion->query('CALL prix_total("'.$idClient.'",@nb)')) {
							echo "Erreur lors de l'appel de la procedure : ('".$connexion->errno."') ".$connexion->error;
						}
						if(!($rs = $connexion->query('SELECT ROUND(@nb*"'.$tva.'",2) as prixTest'))) {
							echo "Erreur lors de la recuperation : ('".$connexion->errno."' )".$connexion->error;
						}

						$prix= $rs->fetch();
						//$prixTVA=floatval($prix['prixTest']*$tva);
						//$prixTVA=sprintf("%.2f",$prixTVA);
						
						//echo "Test du prix : ".$prixTVA.'$';
						echo"<p class='totalttc'>€</p> <input id='totalttc' type='float' name='totalttc' readonly value=".$prix['prixTest']." /><p class='totalht'>Prix TTC</p>";
						?>
						
						<?php
        				
						echo'<br /><br /><br /><button style="float: right; margin-right:50px; border: none; background-color:black; color:white; " onclick="document.location = \'index.php\'">Valider La Commande</button>';
					}
					catch(PDOException $e) //si ça ne fonctionne pas on va "attraper" l'erreur.
					{
                                            die($dsn."erreur :".$e->getMessage()); //on arrete la connexion de la var $dsn.
					}
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