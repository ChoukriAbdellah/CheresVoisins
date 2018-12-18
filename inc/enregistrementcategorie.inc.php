<?php
// ------------------------------------------------------------------
//  vérification des informations saisies dans sidentifieradmin.php -
// ------------------------------------------------------------------

//Utilisation des sessions
session_start();

//On inclut les paramètres de connexion à la bd
include('cnx.inc.php');

//On récupère les saisies du formulaire precedent
$cat=$_POST['cat'];

try {
    //connexion à la base de données
    $connexion = new PDO($DSN,$USER,$PWD);
    
    //préparation de la requete
    $traitement = $connexion->prepare("INSERT INTO `categories`(`libCateg`) VALUES (:cat)");
    //liaison des marqueurs avec les valeurs saisies dans le formulaire
    $traitement->bindparam(':cat', $cat);
    
    //execution de la requete préparée
    $ok = $traitement->execute();    
    
    //$ligne est un tableau avec une seule case (indice 0)
    //cette case contient le résultat de la requete exécutée plus haut
	header('location:../adminpanel.php');
    
}
catch (PDOException $e){
    die("Source : ".$DSN." Erreur : ".$e->getMessage());
}