<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tp_login_php</title>
</head>
<body>
    
</body>
</html>

<form method="POST" action="inscription.php">
    <div>
        <label for="username">Pseudo :</label>
        <input type="text" name="username" id="pseudo" required>
    </div>
    <div>
        <label for="password">mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <button type="submit">inscription</button>
    </div>


</form>

<?php

require 'dashboard.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);// hash du mdp

    
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql); // insertion de la base de données

    try {
        $stmt->execute([
            ":username" => $username,
            ":password" => $hashedPassword
        ]);
        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur : pseudo déjà utilisé.";
    }
}


?>
