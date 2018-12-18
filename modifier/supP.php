
<?php
    include('../inc/cnx.inc.php');
	try
	{ 
		$connexion = new PDO($dsn,$user,$mdp);
		echo ($idP = $_GET['idP']);
		$req_sup='DELETE FROM `produits` WHERE `refProd`= :param';
		$traitement = $connexion->prepare($req_sup);
		$traitement->bindparam(':param',$idP);
		$traitement->execute();
		header('Location: ../afficher_produit.php');
	}

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}

?>
