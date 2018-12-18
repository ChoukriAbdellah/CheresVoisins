<?php
// ------------------------------------------------------------------
//  vérification des informations saisies dans sidentifieradmin.php -
// ------------------------------------------------------------------

//Utilisation des sessions
session_start();

//On inclut les paramètres de connexion à la bd
include('cnx.inc.php');

try {
    //connexion à la base de données
    $connexion = new PDO($dsn,$user,$mdp);
    
    //la requete compte le nb de ligne correspondant au couple login/mdp
    $req = "select count(*) from admin where idA=:i and passwordA=:p;";
    
    //préparation de la requete
    $traitement = $connexion->prepare($req);
    
    //liaison des marqueurs avec les valeurs saisies dans le formulaire
    $traitement->bindparam(':i', $_POST['id']);
    $traitement->bindparam(':p', $_POST['pwd']);
    
    //execution de la requete préparée
    $traitement->execute();
    
    //j'extrait la première ligne du résultat contenu dans l'objet $traitement
    //en utilisant sa méthode fetch()
    $ligne=$traitement->fetch();
    
    //$ligne est un tableau avec une seule case (indice 0)
    //cette case contient le résultat de la requete exécutée plus haut
    if ($ligne[0]=="1") {
        //alors il y a bien 1 résultat
        $_SESSION['user']="admin";
        header('location:../adminpanel.php');
    } else {
        //aucun résultat pour le couple login/mdp saisi        
        header('location:../erreur.php?err=admin');
    }
}
catch (PDOException $e){
    die("Source : ".$dsn." Erreur : ".$e->getMessage());
}

?>