
<?php
    include('../inc/cnx.inc.php');
	try
	{ 
        $connexion = new PDO($dsn,$user,$mdp);
	echo ($_GET['idC']);
	$req_sup='DELETE FROM `clients` WHERE `idC`= :param';
	$traitement = $connexion->prepare($req_sup);
	$traitement->bindparam(':param', $_GET['idC']);
	$traitement->execute();
	header('Location: ../afficher_client.php');
	}

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}

?>
