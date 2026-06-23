<?php
//affiche tous les utlisateurs
session_start();
require_once "dashboard.php"; // connexion avec PDO

if(!isset($_SESSION["user_id"])) {
    header("location: config.php");// on vérifie si l'utilisateur est connecté
    exit;
}

$stmt = $pdo->query("SELECT id, pseudo, created_at FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);// on récupère tous les utilisateurs

$msg = $_GET["msg"] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste utilisateurs</title>
</head>
<body>
    <h1>Liste utilisateurs</h1>

<?php if($msg === "deleted"): ?>
    <p>utilisateur supprimé</p>
<?php endif; ?>

<table>
    <tr>
        <th>id</th>
        <th>pseudo</th>
        <th>date D'inscription</th>
        <th>actions</th>
    </tr>
    <?php foreach($users as $users): ?>
    <tr>
        <td> <?= $users["id"] ?></td>
        <td> <?= htmlspecialchars($users["email"]) ?> </td>
        <td> <?= $users["created_at"] ?> </td>
        <td>
            <a href="profile.php?id=<?= $users['id'] ?>">voir profil</a> |
            <a href="delete.php?id=<?= $users['id'] ?>"
            onclick="return confirm('supprimer cet utilisateur ?');">
            supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>




