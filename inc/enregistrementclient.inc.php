<?php
ini_set('display_errors', 1);
 error_reporting(E_ALL);

session_start();

echo'//On inclut les paramètres de connexion à la bd';


//On récupère les saisies du formulaire precedent
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adr=$_POST['adresse'];
$cp=$_POST['cp'];
$ville=$_POST['ville'];
$mail=$_POST['mail'];

//Comparaison des deux mots de passe saisi
if ($_POST['pwd1'] == $_POST['pwd2']) {
    echo"//si ok : on récupère ce mot de passe";
    $pw=$_POST['pwd1'];
}
else {
    //sinon : redirection vers une page d'erreur avec la paramètre 'pwd'
    header('location:../erreur.php?err=pwd');
}

try {
        include('connexionBDD.php');
    
    //préparation de la requete
    $traitement = $connexion->prepare("INSERT INTO `UTILISATEUR`(`nomC`, `prenomC`, `adresseC`, `cpC`, `villeC`, `mailC`, `passwordC`) VALUES(:nomC,:prenomC,:adresseC,:cpC,:villeC,:mailC,:passwordC)");
    $traitement->bindparam(':nomC', $nom);
    $traitement->bindparam(':prenomC', $prenom);
    $traitement->bindparam(':adresseC', $adr);
    $traitement->bindparam(':cpC', $cp);
    $traitement->bindparam(':villeC', $ville);
    $traitement->bindparam(':mailC', $mail);
    $traitement->bindparam(':passwordC', $pw);

		
		$ok = $traitement->execute();    
		//var_dump($ok);
		if($ok)
		{
			if($_GET['page']=='nouveauclient')
			{
				header('location:../sidentifierclient.php');
			}
			elseif($_GET['page']=='admin')
			{
				header('location:../adminpanel.php');
			}
		}
		else
		{
			header('location:../erreur.php?err=inscription');
		}
		}
catch (PDOException $e){
    die("Source : ".$dsn." Erreur : ".$e->getMessage());
}


?>