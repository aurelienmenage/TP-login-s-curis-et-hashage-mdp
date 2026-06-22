<?php

session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {//on récupère le mdp et le pseudo

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);// on cherche dans la base l'utilisateur
    $stmt->execute([":username" => $username]);
    $user = $stmt->fetch();//on récupère la ligne trouvée

    if ($user && password_verify($password, $user["password"])) {//comparaison du mdp avec le mdp "hashé"

        $_SESSION["user"] = $user["username"];
        $_SESSION["user_id"] = $user["id"];//si ok on met les infos dans $_SESSION

        header("location: dashboard.php");// on renvoie sur la page privée
        exit;

    } else {
        echo "Pseudo ou mot de passe incorrect.";
    }
}
?>
<!--formulaire-->
<form method="POST">
    <label>Pseudo :</label>
    <input type="text" name="username" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">Connexion</button>
</form>