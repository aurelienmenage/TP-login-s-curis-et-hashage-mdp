



<?php



require_once  "config.php"; // on requiert le db pour entrer dans la base de donnée

session_start();


$username = $_POST["username"];
$password = $_POST["password"];


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