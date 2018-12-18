
<?php
	
	$cat=$_POST['cat'];
        include('../inc/cnx.inc.php');
	try
	{ 
            $connexion = new PDO($dsn,$user,$mdp);
	$idCateg =$_GET['idC'];
	$req_upd = "UPDATE categories 
			SET libCateg = '".$cat."'
			WHERE idCateg=".$idCateg;
        $connexion->exec($req_upd);
        $req_upd;
	header('Location: ../afficher_categorie.php');
	}

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}

?>
