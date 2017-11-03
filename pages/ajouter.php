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
        if (! isset($_SESSION['connecte'])) { // On l'invite à se connecter
            include("../includes/demande_connexion.php");
        }
        else { // S'il est bien connecté
            if (isset($_POST['titre'])) { // Si l'on vient d'ajouter un film
                //ajouter le film dans la bdd
                $req = $bdd->prepare('insert into film values(\'\', :titre, :genre, :note, :vu)');
                $req->execute(array(
                    'titre' => $_POST['titre'],
                    'genre' => $_POST['genre'],
                    'note' => $_POST['note'],
                    'vu' => $_POST['vu']
                ));
                echo 'Le film a bien été ajouté !
                Tu peux en ajouter un autre ci-dessous : <br />';
            }
            ?>
            <form method="post" action="ajouter.php"> <!-- Formulaire pour ajouter un film -->
                <fieldset>
                    <legend>Ajoutez un film !</legend>

                    <label for="titre">Titre du film : </label>
                    <input type="text" name="titre" id="titre" required/><br/>

                    <label for="genre">Genre : </label>
                    <select name="genre" required>
                        <option value="Autre">Autre</option>
                        <option value="Aventure">Aventure</option>
                        <option value="Drôle">Drôle</option>
                        <option value="Fantastique">Fantastique</option>
                        <option value="Romantique">Romantique</option>
                        <option value="Science-fiction">Science-fiction</option>
                    </select><br/>

                    <label for="note">Note : </label>
                    <input type="number" min=0 max=5 name="note" id="note" /><br/>

                    <p>
                        Vu : <br/>
                        <label for="oui">Oui</label>
                        <input type="radio" value=1 name="vu" id="oui" checked/>
                        <label for="non">Non</label>
                        <input type="radio" value=0 name="vu" id="non" />
                    </p>

                </fieldset>
                <input type="submit" value="Envoyer ce film !" />
                <br />
            </form>
            <?php
            }
        include("../includes/footer.php");
        ?>
</body>


</html>
