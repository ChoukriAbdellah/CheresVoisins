
<?php



try{
$bdd = new PDO('mysql:host=localhost;dbname=testebdd;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
catch(exception $e){
	die('Erreur :'.$e->getMessage());
}




$req = $bdd->prepare('INSERT INTO personnes(nomC,mailC,passwordC) VALUES(:nomC, :mailC,:passwordC )');

$req->execute(array(
	'nomC' => $_POST['pseudo'],
    'mailC'=>$_POST['mail'],
    'passwordC'=>$_POST['mdp']

    ));
var deroulement= req->execute();
if(deroulemnt){
	console.log("client".$_POST['pseudo']." a bien ete ajouté");

}
elseif{
	console.log("client".$_POST['pseudo']." n'a pas  ete ajouté");
}

?> 
