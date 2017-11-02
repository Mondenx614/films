<footer>
    <a href="page_principale.php">Menu principal</a>
    <?php
    if (isset($_SESSION['connecte'])) { // Bouton déconnexion si besoin
        echo '<a href="../pages/deconnexion.php">Déconnexion</a>';
    }
    ?>
</footer>
