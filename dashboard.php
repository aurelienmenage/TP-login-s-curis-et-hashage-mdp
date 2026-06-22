
<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("location: connexion.php");
    exit;
}
?>

<h1>Bienvenue <?= $_SESSION["user"] ?></h1>
<a href="deconnexion.php">Déconnexion</a>






