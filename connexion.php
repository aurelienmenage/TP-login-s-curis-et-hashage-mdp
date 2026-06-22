
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP_LOGIN_PHP</title>
</head>
<body>


<h2>connexion</h2>


<form method="POST" action="connexion.php">
    <div>
        <label for="username">Pseudo :</label>
        <input type="text" name="username" required>
    </div>
    <div>
        <label for="password">mot de passe :</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">connexion</button>
    </div>

    <div>
        <a href="deconnexion.php">déconnexion</a>
    </div>

</form>
</body>
</html>

<?php


session_start();
require 'dashboard.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM users WHERE username = :username";//on récupère l'utilisateur
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {//on vérifie le mdp
       
     $_SESSION["user"] = $user["username"];
     $_SESSION["user_id"] = $user["id"];

     header("location: dashboard.php");
     exit;
        
    } else {
        echo "pseudo ou mot de passe incorrects.";// si échec
    }
}
?>