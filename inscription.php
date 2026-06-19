

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP_LOGIN_PHP</title>
</head>
<body>

<h2>créer un compte</h2>


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



</body>
</html


<?php



require_once "dashboard.php";// on requiert le db pour entrer dans la bas de donnée

session_start();

$username = $_POST["username"];// prend la valeur envoyé par le formulaire
$password = $_POST["password"];//idem
$hash = password_hash($password, PASSWORD_DEFAULT);// transforme le mdp en "hash" irréversible

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); //"hash"  du mot de passe

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";//requête sql pour insérer une ligne dans la table
$stmt = $pdo->prepare($sql); // et la on demande à pdo de préparer la requête

if($stmt->execute(["username" => $username, "password" => $hashedPassword])) { //  condition SI réussite ou échec
    echo "Vous êtes inscrit";
} else {
    echo "Erreur : pseudo déjà utilisé";
}


?>
