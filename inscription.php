<?php
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ":username" => $username,
            ":password" => $hashedPassword
        ]);
        echo "Inscription réussie ! <a href='connexion.php'>Se connecter</a>";
        exit;
    } catch (PDOException $e) {
        echo "Erreur : pseudo déjà utilisé.";
    }
}
?>

<form method="POST">
    <label>Pseudo :</label>
    <input type="text" name="username" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">Inscription</button>
</form>
