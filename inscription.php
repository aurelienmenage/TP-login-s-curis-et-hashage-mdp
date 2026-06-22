




<?php



require_once "dashboard.php";// on requiert le db pour entrer dans la bas de donnée

session_start();

$username = $_POST["username"];// prend la valeur envoyé par le formulaire
$password = $_POST["password"];//idem
$hash = password_hash($password, PASSWORD_DEFAULT);// transforme le mdp en "hash" irréversible

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); //"hash"  du mot de passe

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";//requête sql pour insérer une ligne dans la table
$stmt = $pdo->prepare($sql); // et la on demande à pdo de préparer la requête

if($stmt->execute(["username" => $username, "password" => $hashedPassword])) { //  condition SI il y a réussite ou échec
    echo "Vous êtes inscrit";
} else {
    echo "Erreur : pseudo déjà utilisé";
}


?>
