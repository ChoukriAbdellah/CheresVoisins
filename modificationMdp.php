<?php
session_start();
// connexion a la base de données
include('inc/connexionBDD.php');
$connexion = new PDO('mysql:host=localhost;dbname=cheresVoisins;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//récupération des valeures transsmise via la methode POST
$mdp=$_POST['mdp'];
$second_mdp=$_POST['mdp2'];
// récupération de l'identifiant de l'utilisateir via la session
$identifiant_client= $_SESSION['identifiant_client'] ;

//vérifiaction des nouveaux mot de passes
if($mdp!=$second_mdp){

	header('location:erreur.php?err=pwd_connecté');
}
else{
	$requete_maj=' UPDATE UTILISATEUR SET passwordC = "'.$mdp.'" 
 WHERE idC= "'.$identifiant_client.'" ';
 
 
$traitement = $connexion->prepare($requete_maj);
 $traitement->execute();
header('location:clientpanel.php');

}
?>