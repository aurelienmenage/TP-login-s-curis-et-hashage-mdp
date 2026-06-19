<?php
$pdo = new PDO("mysql:host=localhost;dbname=auth_demo;charset=utf8", "root", "");

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if($user && password_verify($password, $user["password"])) {
    echo "connecté";
} else {
    echo "Pseudo ou mot de passe incorrect";
}
?>