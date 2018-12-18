<?php
    session_start();
?>
<?php
if ( isset($_SESSION['user']) && ($_SESSION['user']=='admin')) {
// ----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion admin soit présente -
// ----------------------------------------------------------------
include('inc/cnx.inc.php');
echo'moi';
try {
    //connexion à la base de données
    $connexion = new PDO($dsn,$user,$mdp);
    $req_val="SELECT * FROM `clients` ";
    $traitement= $connexion->prepare($req_val);
    $traitement->execute();

    // On affiche alors le panel d'admin, soit tout le code ci-dessous
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
                    <h1>Panel d'administration: Afficher Les Clients</h1>
                    <table class='affiche_client'>
                    <?php
                       while($val=$traitement->fetch()){  
                        ECHO '<tr>';
                        echo'<td><a href ="modifier/sup.php?idC='.$val[0].'"><img src="images/sup.png"></a></td>';
                        echo'<td>'.$val[1].'</td>';
                        echo'<td>'.$val[2].'</td>';
                        echo'<td>'.$val[3].'</td>';
                        echo'<td>'.$val[4].'</td>';
                        echo'<td>'.$val[5].'</td>';
                        echo'<td>'.$val[6].'</td>';
                        echo'<td>'.$val[7].'</td>';
                        echo'<td><a href ="modifier_client.php?idC='.$val[0].'"><img src="images/mod.png"></a></td>';
                        echo'</tr>';
                       }
                    ?>
                    <table>
                    <p style="clear:both" /> 
					<br />
					<br />
					<a href="adminpanel.php"><img src="images/retour.png" style="width:50px; height:50px;"/></a>
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