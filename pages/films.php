<?php
include("../includes/connexion_bdd.php");
session_start();
?>

<!DOCTYPE = html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tous mes films !</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <div id="conteneur_principal">
        <?php
        include("../includes/menu.php");
        if (! isset($_SESSION['connecte'])) { /* On l'invite à se connecter */
            include("../includes/demande_connexion.php");
        }
        else { /* Ici la fonctionnalité de la page */
            echo '<p> Ici, on trouvera la liste de tous les films !</p>';
        }
        include("../includes/footer.php");
        ?>
</body>

</html>
