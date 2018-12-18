
<?php
	
        $nom=$_POST['nom'];
        $desc=$_POST['desc'];
        $prix=$_POST['prix'];
        include('../inc/cnx.inc.php');
	try
	{ 
            $connexion = new PDO($dsn,$user,$mdp);
	 $req_upd = "UPDATE `produits` SET `nomProd`='.$nom.',`descProd`='.$desc.',`PUHTProd`='.$prix.' WHERE refProd='".$_GET['idP'] ."'";
        $connexion->exec($req_upd);
        $req_upd;
	header('Location: ../afficher_produit.php');
	}

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}

?>
