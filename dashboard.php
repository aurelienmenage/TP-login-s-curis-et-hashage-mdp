

<?php

//sert pour la connexion  à la base mysql

$pdo = new PDO(  // on créer l'objet pdo
    "mysql:host=localhost;dbname=tp_login_php;charset=utf8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,// en cas d'erreur sql pdo lance une exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC// on  retourne les résultats sous forme de tableaux associatifs
    ]
);
?>






