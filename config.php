<?php



$host = "localhost";
$dbname = "tp_login_php"; // variables pour se connecter à mysql
$user = "root";
$password = "";

try {//try contient le code qui peut potentiellement échouer
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);//création de la connexion entre mysql via PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// ça indique à PDO d lancer des exceptions en cas d'erreur sql
} catch(PDOException $e) {//catch intercepte les erreurs de type "PDOException" 
    die("Erreur : " . $e->getMessage());//"die" arrête le script et affiche un message d'erreur
}
?>