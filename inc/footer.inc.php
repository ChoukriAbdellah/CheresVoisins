<?php

// ---------------------------------------------------------------------------
//  le lien "Administration renvoie soit vers le formulaire d'identification -
//  soit vers le panel d'admin si l'admin est déjà connecté                  -
// ---------------------------------------------------------------------------

    //On determine si un admin est déjà connecté
    if (isset($_SESSION['user']) && $_SESSION['user']=="admin") {
        // le lien "Administration" pointera directmeent vers le panel admin
        $page = "adminpanel.php";
    }
    else {
        // sinon le lien devra pointer vers le formulaire d'identification admin
        $page = "sidentifieradmin.php";
    }
?>

<footer>              
    <a href="#">Mentions légales</a> |
	<a href="mailto:contact@hellguitars.fr">Nous contacter</a> |
	<a href="<?php echo $page; ?>">Administration</a>
</footer>