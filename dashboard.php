
<?php

$host = "localhost";
$dbname = "tp_login_php";
$user = "root";
$pass = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("erreur :" . $e->getMessage());
}



?>






