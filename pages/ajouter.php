<?php
include("../includes/connexion_bdd.php");
session_start();
?>

<!DOCTYPE = html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ajouter un film</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <div id="conteneur_principal">
        <?php
        include("../includes/menu.php");
        if (! isset($_SESSION['connecte'])) { /* On l'invite à se connecter */
            include("../includes/demande_connexion.php");
        }
        else {
            echo '<p> Ici, un petit formulaire des familles pour ajouter un film à la collection !</p>';
        }
        include("../includes/footer.php");
        ?>
</body>


</html>
