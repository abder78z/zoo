<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "mysql";
$base = "zoo";

$conn = mysqli_connect($serveur, $utilisateur, $motDePasse, $base);

if (!$conn) {
    die("Erreur de connexion à la base : " . mysqli_connect_error());
}
?>