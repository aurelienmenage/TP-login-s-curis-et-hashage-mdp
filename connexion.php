<?php

session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["user"] = $user["username"];
        $_SESSION["user_id"] = $user["id"];

        header("location: dashboard.php");
        exit;

    } else {
        echo "Pseudo ou mot de passe incorrect.";
    }
}
?>

<form method="POST">
    <label>Pseudo :</label>
    <input type="text" name="username" required>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">Connexion</button>
</form>