<?php
include("../includes/connexion_bdd.php");
session_start();
?>

<!DOCTYPE = html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Liste des films à voir</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <div id="conteneur_principal">
        <?php
        include("../includes/menu.php");
        if (! isset($_SESSION['connecte'])) { // On l'invite à se connecter
            include("../includes/demande_connexion.php");
        }
        else { // Liste des films à voir
            $reponse = $bdd->query('select * from film where vu=0');
            while ($donnees = $reponse->fetch()) {
                echo $donnees['titre'] . '<br />';
            }
        }
        include("../includes/footer.php");
        ?>
</body>


</html>
