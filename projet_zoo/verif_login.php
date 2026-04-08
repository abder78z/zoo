<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connexion.php");

$login = $_POST["login"];
$mot_de_passe = $_POST["mot_de_passe"];

$sql = "SELECT * FROM personnels WHERE login='$login' AND mot_de_passe='$mot_de_passe'";
$resultat = mysqli_query($conn, $sql);

if (!$resultat) {
    die("Erreur SQL : " . mysqli_error($conn));
}

if (mysqli_num_rows($resultat) > 0) {
    $user = mysqli_fetch_assoc($resultat);

    $_SESSION["prenom"] = $user["prenom"];
    $_SESSION["fonction"] = $user["fonction"];

    header("Location: accueil.php");
    exit();
} else {
    header("Location: login.php?erreur=1");
    exit();
}
?>