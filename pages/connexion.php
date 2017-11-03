<?php
include("../includes/connexion_bdd.php");
session_start();
if (isset($_SESSION['connecte'])) { // S'il est déjà connecté
    echo 'Tu es bien connecté !';
    include("../includes/menu.php");
} else {
    if (isset($_POST['identifiant']) && isset($_POST['mdp'])) { // S'il a appuyé sur se connecter
        if ($_POST['identifiant'] != '' && $_POST['mdp'] != '') { // Tout rentré
            $reponse = $bdd->prepare('select mdp from compte where identifiant=?');
            $reponse->execute(array($_POST['identifiant']));
            $donnee = $reponse->fetch();
            if ($_POST['mdp'] == $donnee['mdp']) { // Bon mdp
                $_SESSION['connecte'] = true;
                echo 'Tu es bien connecté !';
                include("../includes/menu.php");
                $form = false;
            } else { // Mauvais mdp
                echo 'L\'identifiant ou le mot de passe est faux.';
                $form = true;
            }
        }
        else { // S'il a pas tout rentré
            $form = true;
            if ($_POST['identifiant'] == '' && $_POST['mdp'] != '') { // Pas d'identifiant
                echo 'Tu dois rentrer un identifiant !';
            }
            elseif ($_POST['identifiant'] != '' && $_POST['mdp'] == '') { // Pas de mdp
                echo 'Tu dois rentrer un mot de passe !';
            }
            elseif ($_POST['identifiant'] == '' && $_POST['mdp'] == '') { // Rien écrit
                echo 'Tu dois rentrer un identifiant et un mot de passe !';
            }
        }
    } else { // Pas encore appuyé sur se connecter : premier passage sur la page
        $form = true;
    }
    if ($form) { // Si on remplit le formulaire
        ?>
        <form method="post" action="connexion.php"> <!-- Formulaire pour se connecter -->
            <label for="identifiant">Identifiant : </label>
            <input type="text" name="identifiant" id="identifiant" />
            <label for="mdp">Mot de passe : </label>
            <input type="password" name="mdp" id="mdp" />
            <input type="submit" value="Se connecter" />
            <br />
        </form>
        <?php
    }
}
include("../includes/footer.php");
?>
