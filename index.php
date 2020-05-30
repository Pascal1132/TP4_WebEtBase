<?php
//Afficher toutes les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Framework/Routeur.php';
//instancier le routeur
$routeur = new Routeur();
$routeur->routerRequete();




