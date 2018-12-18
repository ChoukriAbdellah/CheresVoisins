<?php
session_start();
// connexion a la base de données
include('inc/connexionBDD.php');
$connexion = new PDO('mysql:host=localhost;dbname=cheresVoisins;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//récupération des valeures transsmise via la methode POST
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$mdp=$_POST['mdp'];
$second_mdp=$_POST['mdp2'];
// récupération de l'identifiant de l'utilisateir via la session
$identifiant_client= $_SESSION['identifiant_client'] ;



//mise à jour des données
$requete_maj=' UPDATE UTILISATEUR SET nomC = "'.$nom.'" , prenomC = "'.$prenom.'" , adresseC = "'.$adresse.'"
 WHERE idC= "'.$identifiant_client.'" ';
 
 
$traitement = $connexion->prepare($requete_maj);
 $traitement->execute();
header('location:clientpanel.php');


 
?>