<?php
//affiche les infos d'un seul utilisateur

session_start();
require_once "dashboard.php";

if(isset($_GET["id"]) || empty($_GET["id"])) {  
    die('id manquant');
}

$id = (int) $_GET["id"];// on sécurise l'id

$stmt = $pdo->prepare("SELECT pseudo, created_at FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil utilisateur</title>
</head>
<body>

<?php if($user): ?>
    <h1>profil de <?= htmlspecialchars($user["pseudo"]) ?></h1>
    <p>date d'inscription : <?= $user["created_at"] ?></p>
    <?php else: ?>
        <h2>utilisateur introuvable</h2>
    <?php endif; ?>

<p><a href="list_users.php">retour à la liste</a></p>
    
</body>
</html>





