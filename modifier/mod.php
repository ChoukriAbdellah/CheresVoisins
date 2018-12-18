
<?php
	
	echo $nom=$_POST['nom'];
	echo $prenom=$_POST['prenom'];
	echo $adresse=$_POST['adresse'];
	echo $cp=$_POST['cp'];
	echo $ville=$_POST['ville'];
	echo $mail=$_POST['mail'];
        echo $passwordC=$_POST['pwd1'];
        include('../inc/cnx.inc.php');
	try
	{ 
            $connexion = new PDO($dsn,$user,$mdp);
	$idC =$_GET['idC'];
	$req_upd = "UPDATE clients 
			SET nomC = '".$nom."',
				prenomC = '".$prenom."',
				adresseC = '".$adresse."',
				cpC = '".$cp."',
				villeC = '".$ville."',
				mailC = '".$mail."',
				passwordC = '".$passwordC."'
			WHERE idC=".$idC;
        $connexion->exec($req_upd);
        echo $req_upd;
		 	//$ajout_1= $connexion -> query($req_upd);
			//	$donnee = $ajout_1 -> fetch();
	//$traitement->execute();
	//var_dump($traitement);
	header('Location: ../afficher_client.php');
	}

	catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}

?>
