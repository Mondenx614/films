<footer>
    <a href="page_principale.php">Menu principal</a>
    <?php
    if (isset($_SESSION['connecte'])) {
        echo '<a href="../pages/deconnexion.php">Déconnexion</a>';
    }
    ?>
</footer>
