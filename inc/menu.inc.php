<div id="sidebar"> 
	<ul class="vmenu">
		<li>
		<a href="index.php">Accueil</a>
		</li>	
		<li>
		<b>Vos voisins</b>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="prod_electriques.php"> reherche</a>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="annonceOnline.php">derrnières anonces</a>
		</li>
			
		<li><br/></li>
		<li>
		<b> service </b>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="ajouterService.php">Location de biens</a>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="serviceLocation.php">annonce en ligne</a>
		</li>

		<b> bien </b>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="ajouterBien.php">Location de services</a>
		</li>
		<li>
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="bienLocation.php">annonce en ligne</a>
		</li>


		
		<li><br/></li>
		<?php
                    if (isset($_SESSION['user']) && ($_SESSION['user']=="admin")) {
                        // un admin est loggé
                        include_once('menuadmin.inc.php');
                    } else
                        if (isset($_SESSION['user']) && ($_SESSION['user']=="client")) {
                            // un client est loggé
                            include_once('menuclient.inc.php');
                        }
                        else {
                            // la variable session n'existe pas ou
                            // sa valeur n'est ni admin ni client
                            include_once('menuvisiteur.inc.php');
                        }

		?>
                
	</ul>
</div>