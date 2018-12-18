<?php
    session_start();
?>
<?php
if ( isset($_SESSION['user']) && ($_SESSION['user']=='admin')) {
// ----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion admin soit présente -
// ----------------------------------------------------------------
include('inc/cnx.inc.php');
try {
    $idC=$_GET['idC'];
    ?>    
    <!DOCTYPE html>
    <html lang="fr">
      <head>
            <meta charset="UTF-8">
        <title>Hell Guitars</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
      </head>
      <body>
        <div id="wrapper"> 
          <div id="bg"> 
            <div id="header"></div>         
            <div id="page"> 
              <div id="container"> 

              <!-- bannière -->  
                <div id="banner"></div>  
              <!-- fin bannière -->  

              <!--  partie principale -->  
                <section>

                  <!-- menu -->
                  <nav>				
                    <?php
                            include_once('inc/menu.inc.php');
                    ?>
                  </nav>
                  <!-- fin du menu -->

                  <!-- contenu principale de la page -->
                  <article id="center">				
                    <h1>Panel d'administration: Ajouter ûn nouveau Client</h1>
                    <p>
                         <?php
                        echo '<form action="modifier/mod.php?idC='.$idC.'" method="post">';
                            $connexion = new PDO($dsn,$user,$mdp);
                            $req_val="SELECT * FROM `clients` WHERE `idC`= :idC";
                            $traitement= $connexion->prepare($req_val);
                            $traitement->bindparam(':idC', $idC);
                            $traitement->execute();
                            while($val=$traitement->fetch()){
                                //echo $req_val="SELECT * FROM `clients` WHERE `mailC`=:idC";
                            $val[0];
                          echo "<fieldset>
                              <legend>informations personnelles</legend>
                              <label for='nom'>Nom</label>
                              <input type='text' name='nom' value =".$val[1]." /><br/>
                              <label for='prenom'>Prénom</label>
                              <input type='text' name='prenom' value =".$val[2]." /><br/><br />                                           
                              <label for='adresse'>Adresse</label>
                              <input type='text' name='adresse' value =".$val[3]." /><br/>
                              <label for='cp'>Code postal</label>
                              <input type='text' name='cp' value =".$val[4]." /><br/>
                              <label for='ville'>Ville</label>
                              <input type='text' name='ville' value =".$val[5]." /><br />
                          </fieldset>
                          <fieldset>
                              <legend>informations de connexion</legend>
                              <label for='mail'>Adresse e-mail</label>
                              <input type='mail' name='mail' required maxlength='50' value =".$val[6]." /><br/>
                              <label for='pwd1'>Mot de passe</label>
                              <input type='password' name='pwd1' maxlength='32' value =".$val[7]." /><br/>
                              <label for='pwd2'>Confirmez</label>
                              <input type='password' name='pwd2' maxlength='32' value =".$val[7]." /><br/><br/>
                              <label></label>
                              <input type='submit' value=Modifier />
                          </fieldset>";	
                            }
                            ?>
                  </form>
                    </p>                
                    <p style="clear:both" /> 
                  </article>
                  <div style="clear:both;height:40px"></div>
                <!-- fin du contenu principale -->

                </section>  
              <!-- fin partie principale --> 

              </div>  
            </div>  

            <!-- pied de page -->
            <div id="footerWrapper"> 
                <?php
                    include_once('inc/footer.inc.php');
                ?>
            </div> 
            <!-- fin pied de page -->

          </div> 
        </div> 
      </body>

    </html>
    <?php
}
catch (Exceptions $e){
	die($dsn."erreur : ". $e->getMessage());
}
}
else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>