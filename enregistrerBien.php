<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
    session_start();

$nom_bien=$_POST['nom_bien'];
$description=$_POST['desc_bien'];
$prix_neuf=$_POST['prix'];
$date_fin=$_POST['date'];
$categorie=$_POST['cat'];
$mail=$_SESSION['mail'];
	
?>	

<?php
 if(isset(($_SESSION['user']))){
$connexion = new PDO('mysql:host=localhost;dbname=cheresVoisins;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
		
		




	//insertion dans la table bien
	 
		$traitement = $connexion->prepare('INSERT INTO `BIEN`( PRIxNEUF, NOM, DESCRIPTION,CATEGORIE) VALUES (:prix,:mon,:descrip,:cat) ');
		$traitement->execute(array(
		'prix'=> $prix_neuf,
		'mon'=> $nom_bien,
		'descrip'=>  $description,
		'cat'=>$categorie


			));

		$req='SELECT COUNT(idBien)as nombre FROM BIEN ';
		$nb_ligne=$connexion->query($req); //$reponse prendra le resultat de la requete SQL contenue dans la var $req.
          $ligne=$nb_ligne->fetch();
          $nom_fichier=$ligne['nombre'];
           
		
		//insertion dans la table bine_app_categorie
		$req_id_cat='SELECT `idCateg`as identifiant_categorie  FROM `categorie` WHERE  libelle_fils= "'.$categorie.'"';
		$id_c=$connexion->query($req_id_cat);
        $ligne_categorie=$id_c->fetch();
        $ident=$ligne_categorie['identifiant_categorie'];
	

		
		

		$insertion= $connexion->prepare('INSERT INTO `bien_app_cat`( idBien_cat,id_libelle ) VALUES (:id_B, :id_L) ');
		$insertion->execute(array(
		'id_B'=> $nom_fichier,
		'id_L'=>$ident

		

			));
		
		//$traitement->execute();  
		if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0){


		if ($_FILES['image']['size'] <= 1000000)

        {

                // Testons si l'extension est autorisée

                $infosfichier = pathinfo($_FILES['image']['name']);

                $extension_upload = $infosfichier['extension'];

                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($extension_upload, $extensions_autorisees))

                {

                        // On peut valider le fichier et le stocker définitivement


                		if($ligne['nombre']==1) {$nom_fichier=1;} 
                		else {
                		$nom_fichier=$ligne['nombre'];
                	}

                		///echo $nom_fichier;
                		echo "Date : ".$date_fin;
                		
                		move_uploaded_file($_FILES['image']['tmp_name'], 'images/prod/'.$nom_fichier.'.jpg');

                       

						$traitement_1 = $connexion->prepare('INSERT INTO `PROPOSE_BIEN`( 	idBien_P 	,IDUSER_P 	,DATE_fIN) VALUES (:idB,:idU,:dateF) ');
							$traitement_1->execute(array(
							'idB'=> $nom_fichier,
							'idU'=> $_SESSION['identifiant_client'],
							'dateF'=>$_POST['date']
								));
							header('location:index.php');
                        
                }
                else {
				//echo 'Echec de l\'upload !'; 
				header('location:erreur.php?err=upload');
			}

        
			
			}
		else {
				//echo 'Echec de l\'upload !'; 
				header('location:erreur.php?err=upload');
			}
		
 
   }
}
else {
				//echo 'Echec de l\'upload !'; 
				header('location:erreur.php?err=non_connecter');
			}
 

 




?>
