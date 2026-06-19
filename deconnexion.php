

<?php

session_start();//démarre la session

session_destroy();//détruit la session

header("location: connexion.php"); // redirige vers la page de connexion
exit;

?>