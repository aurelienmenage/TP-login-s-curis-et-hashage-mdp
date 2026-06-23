<?php
//supprime un utilisateur grâce à son id

session_start();
require_once 'db.php';


if (!isset($_GET['id']) || empty($_GET['id'])) { //on vérifie si l'id est présente
    die("ID manquant.");
}

$id = (int) $_GET['id'];


if ($id === $_SESSION['user_id']) { // on empêche qu'un utilisateur se supprime lui même
    die("Vous ne pouvez pas vous supprimer vous-même.");
}


$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");// on supprime le fichier sql
$stmt->execute([$id]);


header("Location: list_users.php?msg=deleted");//on redirige vers la liste utilisateurs 
exit;




?>