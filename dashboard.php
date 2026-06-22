
<?php
session_start();

if (!isset($_SESSION["user"])) {// si pas connnecté
    header("location: connexion.php");//on le renvoie à la connexion
    exit;
}
?>

<h1>Bienvenue <?= $_SESSION["user"] ?></h1><!--si ok, on affiche le message-->
<a href="deconnexion.php">Déconnexion</a>






