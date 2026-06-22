<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP_LOGIN_PHP</title>
</head>
<body>


<h2>connexion</h2>


<form method="POST" action="connexion.php">
    <div>
        <label for="username">Pseudo :</label>
        <input type="text" name="username" required>
    </div>
    <div>
        <label for="password">mot de passe :</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">connexion</button>
    </div>

    <div>
        <a href="deconnexion.php">déconnexion</a>
    </div>

</form>

<h2>créer un compte</h2>


<form method="POST" action="inscription.php">
    <div>
        <label for="username">Pseudo :</label>
        <input type="text" name="username" id="pseudo" required>
    </div>
    <div>
        <label for="password">mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <button type="submit">inscription</button>
    </div>


</form>

</body>
</html>

