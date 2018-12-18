<?php
session_start();
ini_set('display_errors', 1);
 error_reporting(E_ALL);
// -------------------------------------------------------------------
//  vérification des informations saisies dans sidentifierclient.php -
// -------------------------------------------------------------------

//On inclut les paramètres de connexion à la bd
include('cnx.inc.php');

try {
    //connexion à la base de données
    include('connexionBDD.php');
    
    //la requete compte le nb de ligne correspondant au couple login/mdp
    $req = "select * from UTILISATEUR where mailC=:m and passwordC=:p;";
    //préparation de la requete
    $traitement = $connexion->prepare($req);
    
    //liaison des marqueurs avec les valeurs saisies dans le formulaire
    $traitement->bindparam(':m', $_POST['mail']);
    $traitement->bindparam(':p', $_POST['pwd']);
    
    //execution de la requete préparée
    $traitement->execute();
    
    //j'extrait la première ligne du résultat contenu dans l'objet $traitement
    //en utilisant sa méthode fetch(). Elle renvoie TRUE si il ya bien un résultat
    //et FALSE s'il n'y a aucun résultat
    if ($ligne=$traitement->fetch()) {
        //alors il y a bien 1 résultat
        $_SESSION['user']="client";
        $_SESSION['nocli']=$ligne['idC'];
        $_SESSION['mail']=$_POST['mail'];
        header('location:../clientpanel.php');
    } else {
        //aucun résultat pour le couple login/mdp saisi
        header('location:../erreur.php?err=client');    
    }
    
    //$ligne est un tableau avec une seule case (indice 0)
    //cette case contient le résultat de la requete exécutée plus haut
    /*
    if ($ligne[0]=="1") {
        //alors il y a bien 1 résultat
        $_SESSION['user']="client";
        $_SESSION['nocli']=
        header('location:../clientpanel.php');
    } else {
        //aucun résultat pour le couple login/mdp saisi
        header('location:../erreur.php?err=client');
    }*/
}
catch (PDOException $e){
    die("Source : ".$dsn." Erreur : ".$e->getMessage());
}

?>