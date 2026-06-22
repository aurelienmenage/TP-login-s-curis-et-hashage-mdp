

<?php



require_once "config.php";// on requiert le db pour entrer dans la bas de donnée
session_start();

if(!empyty($_POST["username"]) && !empty($_POST["password"])) {

$username = $_POST["username"];// prend la valeur envoyé par le formulaire
$password = $_POST["password"];//idem

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); //"hash"  du mot de passe

$check = $pdo->prepare("SELECT id FROM users WHERE username = :username");
$check->execute(["username" => $username]);

if($check->rowCount() > 0) {
    echo "pseudo déja utilisé";
    exit;
}

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";//requête sql pour insérer une ligne dans la table
$stmt = $pdo->prepare($sql); // et la on demande à pdo de préparer la requête

if($stmt->execute(["username" => $username, "password" => $hashedPassword])) { //  condition SI il y a réussite ou échec
    echo "Vous êtes inscrit";
} else {
    echo "Erreur à l'inscription";
}
} else {
    echo "veuillez remplir tous les champs";
}

?>
