<?php
// ------------------------------------------------------------------
//  vérification des informations saisies dans sidentifieradmin.php -
// ------------------------------------------------------------------

//Utilisation des sessions
session_start();

echo'//On inclut les paramètres de connexion à la bd';
include('cnx.inc.php');

//On récupère les saisies du formulaire precedent
$no=$_POST['nom'];
$pr=$_POST['prenom'];
$ad=$_POST['adresse'];
$cp=$_POST['cp'];
$vi=$_POST['ville'];
$ma=$_POST['mail'];

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
    echo"//connexion à la base de données";
   $connexion = new PDO($dsn,$user,$mdp));
    
    //préparation de la requete
    $traitement = $connexion->prepare("INSERT INTO `clients`(`nomC`, `prenomC`, `adresseC`, `cpC`, `villeC`, `mailC`, `passwordC`) VALUES(:nomC,:prenomC,:adresseC,:cpC,:villeC,:mailC,:passwordC)");
    $traitement->bindparam(':nomC', $no);
    $traitement->bindparam(':prenomC', $pr);
    $traitement->bindparam(':adresseC', $ad);
    $traitement->bindparam(':cpC', $cp);
    $traitement->bindparam(':villeC', $vi);
    $traitement->bindparam(':mailC', $ma);
    $traitement->bindparam(':passwordC', $pw);
    
    //execution de la requete préparée
    $ok = $traitement->execute();    
    
    //$ligne est un tableau avec une seule case (indice 0)
    //cette case contient le résultat de la requete exécutée plus haut
    if ($ok==TRUE) {
        echo"//si l'insertion à bien marché" ;
        $_SESSION['user']="client";
        $_SESSION['nocli']=$connexion->lastInsertId();
        echo $_SESSION['nocli'];
        if($_GET['page']== 'nouveauclient' ){
            //header('location:../index.php');
			echo'sa marche'
        }
        else {
			echo'ereur ';
    }
    } else {
        //sinon : l'insertion rencontre un problème        
       header('location:../erreur.php?err=nouveauclient');
    }
}
catch (PDOException $e){
    die("Source : ".$dsn." Erreur : ".$e->getMessage());
}