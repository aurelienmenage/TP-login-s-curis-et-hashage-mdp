
<?php

$pdo = new PDO("mysql:host=localhost;dbname=auth_demo;charset=utf8", "root", "");

$username = $_POST["username"];
$password = $_POST["password"];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $hashedPassword]);

echo "Vous êtes inscrit";

?>
