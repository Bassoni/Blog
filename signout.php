<?php

//les deux lignes qui suivent effectuent la connexion a la Base de données

include 'UserSession.php';

$UserSession = new UserSession();
$UserSession->signOut();

header('Location: index.php');

exit;


