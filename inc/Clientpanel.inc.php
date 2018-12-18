
<?php
	

        include('cnx.inc.php');
	try
	{ 
	$connexion = new PDO($dsn,$user,$mdp);
		if(isset($_GET['idC'])){
		echo'moi';
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$adresse=$_POST['adresse'];
			echo($req_upd = "UPDATE `clients` SET `nomC`='".$nom."',`prenomC`='".$prenom."',`adresseC`='".$adresse."' WHERE `idC`=".$_GET['idC']);
			$connexion->exec($req_upd);
		}
				
		//header('Location: ../afficher_categorie.php');
		if(isset($_GET['mdp'])){
		$connexion = new PDO($DSN,$USER,$PWD);
		$mdp=$_POST['mdp'];
		$req_upd = "UPDATE `clients` SET `passwordC`='".$mdp."' WHERE `idC`=".$_GET['mdp'];
			$connexion->exec($req_upd);	
	}
	}
	

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}
		header('Location: ../clientpanel.php');
?>
	
	
	

