<?php

	//Utilisation des sessions
	session_start();
	try {
		//connexion à la base de données
		include('cnx.inc.php');
		$connexion = new PDO($dsn,$user,$mdp);
		$refProd=$_POST['refProd'];
		$nomProd=$_POST['nomProd'];
		$descProd=$_POST['descProd'];
		$PUHTProd=$_POST['PUHTProd'];
		$categProd= $_POST['categProd'];
		$traitement__categProd=$connexion->prepare('SELECT idCateg FROM `categories` WHERE `libCateg`= :categProd ');
		$traitement__categProd->bindparam(':categProd', $categProd);
		$traitement__categProd->execute();
		while($ligne=$traitement__categProd->fetch()){
			$categProd=$ligne[0];
		}
		
		$refProd = strtr($refProd, 
		'abcdefghijklmnopqrstuvwxyz', 
		'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
		
		//préparation de la requete
		$traitement = $connexion->prepare("INSERT INTO `produits`(`refProd`, `nomProd`, `descProd`, `PUHTProd`, `categProd`) VALUES (:refProd,:nomProd,:descProd,:PUHTProd,:categProd)");
		
		//liaison des marqueurs avec les valeurs saisies dans le formulaire
		$traitement->bindparam(':refProd', $refProd);
		$traitement->bindparam(':nomProd', $nomProd);
		$traitement->bindparam(':descProd', $descProd);
		$traitement->bindparam(':PUHTProd', $PUHTProd);
		$traitement->bindparam(':categProd', $categProd);
		
		//execution de la requete préparée
		$traitement->execute();    
		
		//Upload Le fichier.
		$dossier = "../images/prod/ "; 
		$fichier = basename($_FILES['image']['name']);// Retourne le nom du fichier dans un chemin
		$taille_maxi = 100000; // taille maxi autorisé
		$taille = filesize($_FILES['image']['tmp_name']);// Lit la taille d'un fichier
		$extensions = array('.png','.jpg', '.jpeg'); // les differentes extensions possibles
		$extension = strrchr($_FILES['image']['name'], '.'); // Lit l'extension du fichier uploader

		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)){ //Si l'extension n'est pas dans le tableau
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
			header('location:../erreur.php?err=type_fichier');
		}
		if($taille>$taille_maxi){
			$erreur = 'Le fichier est trop gros...';
			header('location:../erreur.php?err=taille_fichier');
		}
		if(!isset($erreur)) {//S'il n'y a pas d'erreur, on upload
			//On formate le nom du fichier ici...
			$fichier = $refProd;
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '', $fichier);
			if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichier.'.jpg')) {//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				// echo 'Upload effectué avec succès !';
				header('location: ../adminpanel.php');
			}
			else {
				//echo 'Echec de l\'upload !'; 
				header('location:../erreur.php?err=upload');
			}
		}
	}
	catch (PDOException $e){
		die("Source : ".$DSN." Erreur : ".$e->getMessage());
	}

	//
?>