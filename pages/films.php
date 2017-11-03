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
        if (! isset($_SESSION['connecte'])) { // On l'invite à se connecter
            include("../includes/demande_connexion.php");
        }
        else { // Liste des films organisée
            ?>
            <form method="post" action="films.php"> <!-- Choix du tri -->
                <label for="tri">Trier par : </label>
                <select name="tri" required>
                    <option value="titre">Titre</option>
                    <option value="genre">Genre</option>
                    <option value="note">Note</option>
                </select><br/>
                <input type="submit" value="Trions !" />
            </form>
            <?php
            if (! isset($_POST['tri'])) {
                $tri = 'titre'; // Trié par titre par défaut
            } else {
                $tri = $_POST['tri'];
            }
            if ($tri == 'titre') {
                $reponse = $bdd->query('select * from film where vu=1 order by titre');
            } elseif ($tri == 'genre') {
                $reponse = $bdd->query('select * from film where vu=1 order by genre');
            } elseif ($tri == 'note') {
                $reponse = $bdd->query('select * from film where vu=1 order by note');
            }
            while ($donnee = $reponse->fetch()) {
                echo '<p><strong>Titre :</strong> ' . $donnee['titre'] . '<br/>' .
                    '<strong>Genre :</strong> ' . $donnee['genre'] . '<br/>' .
                    '<strong>Note :</strong> ' . $donnee['note'] . '<br/></p>';
            }
        }
        include("../includes/footer.php");
        ?>
</body>

</html>
