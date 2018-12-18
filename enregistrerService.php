<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
    session_start();

$nom_service=$_POST['nom_service'];
$description=$_POST['desc_service'];
$prix=$_POST['prix'];
$date_fin=$_POST['date'];
$categorie=$_POST['cat'];
$mail=$_SESSION['mail'];
	
?>	

<?php
 if(isset(($_SESSION['user']))){
$connexion = new PDO('mysql:host=localhost;dbname=cheresVoisins;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
		
		




	//insertion dans la table bien
	 //try{
		$traitement = $connexion->prepare('INSERT INTO `SERVICE`(  NOM, PRIX, CATEGORIE,DESCRIPTION) VALUES (:nom,:prix,:cat,:descrip) ');
		$traitement->execute(array(
		'nom'=> $nom_service,
		'prix'=> $prix,
		'cat'=>$categorie,
		'descrip'=>  $description
		


			));

		$req='SELECT COUNT(IDSERVICE)as nombre FROM SERVICE ';
		$nb_ligne=$connexion->query($req); //$reponse prendra le resultat de la requete SQL contenue dans la var $req.
          $ligne=$nb_ligne->fetch();
          $nom_fichier=$ligne['nombre'];
          

		
		//insertion dans la table bine_app_categorie
		$req_id_cat='SELECT `idCateg`as identifiant_categorie  FROM `categorie` WHERE  libelle_fils= "'.$categorie.'"';
		$id_c=$connexion->query($req_id_cat);
        $ligne_categorie=$id_c->fetch();
        $ident=$ligne_categorie['identifiant_categorie'];
	

		
		

		$insertion= $connexion->prepare('INSERT INTO `service_app_cat`( IDSERVICE_cat,id_libelle ) VALUES (:id_S, :id_L) ');
		$insertion->execute(array(
		'id_S'=> $nom_fichier,
		'id_L'=>$ident

		

			));
		
		

                       

						$traitement_1 = $connexion->prepare('INSERT INTO `PROPOSE_SERVICE`( 	IDSERVICE_P 	,IDUSER_P 	,DATE_fIN) VALUES (:idS,:idU,:dateF) ');
							$traitement_1->execute(array(
							'idS'=> $nom_fichier,
							'idU'=> $_SESSION['identifiant_client'],
							'dateF'=>$_POST['date']
								));
							header('location:index.php');
                        

               
		//}
		//catch(PDOException $e){
		//	$e->getMessage();
		//}
 
   
}
else {
				//echo 'Echec de l\'upload !'; 
				header('location:erreur.php?err=non_connecter');
			}
 

 




?>
