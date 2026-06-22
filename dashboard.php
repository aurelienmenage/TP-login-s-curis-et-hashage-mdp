

<?php

//sert pour la connexion  à la base mysql

session_start();


$pdo = new PDO(  // on créer l'objet pdo
    "mysql:host=localhost;dbname=web;charset=utf8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,// en cas d'erreur sql pdo lance une exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC// on  retourne les résultats sous forme de tableaux associatifs
    ]
);
?>






