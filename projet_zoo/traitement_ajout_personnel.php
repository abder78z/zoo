<?php
session_start();
include("connexion.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_de_naissance = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$fonction = $_POST['fonction'];
$login = $_POST['login'];
$mot_de_passe = $_POST['mot_de_passe'];
$salaire = $_POST['salaire'];

$sql = "INSERT INTO personnels (nom, prenom, date_de_naissance, sexe, login, mot_de_passe, fonction, salaire)
        VALUES ('$nom', '$prenom', '$date_de_naissance', '$sexe', '$login', '$mot_de_passe', '$fonction', '$salaire')";

mysqli_query($conn, $sql);

header("Location: personnels.php");
exit();
?>