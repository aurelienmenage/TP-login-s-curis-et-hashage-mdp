

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



require_once  "dashboard.php"; // on requiert le db pour entrer dans la base de donnée

session_start();


$username = $_POST["username"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE username = :username";// on récupère les utilisateurs par leur pseudo
$stmt = $pdo->prepare($sql);
$stmt->execute(["username" => $username]);
$user =$stmt->fetch();

if($user && password_verify($password, $user["password"])) {
    echo "connecté";// boucle pour vérifier si le mot de passe est bon
} else {
    echo "Pseudo ou mot de passe incorrect";
}
?>