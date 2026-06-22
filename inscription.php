<?php
//on créé un compte
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {// on vérifie l'envoi du formulaire

    $username = $_POST["username"];
    $password = $_POST["password"];//on récupère ce que l'utilisateur a envoyé

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);// chiffrage du mot de passe (ne jamais stocker le vrai!!)

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql); // on ajoute l'utilisateur dans la table

    try{
        $stmt->execute([ //on envoie la requête à la base
            ":username" => $username,
            ":password" => $hashedPassword
        ]);
        echo "Inscription réussie  <a href='connexion.php'>Se connecter</a>";
        exit;
    } catch (PDOException $e) {
        
        echo "Erreur : pseudo déjà utilisé.";
    }
}
?>
<!-- renvoie le fichier en POST en cliquant sur inscription-->
<form method="POST">
    <label>Pseudo :</label>
    <input type="text" name="username" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">Inscription</button>
</form>
