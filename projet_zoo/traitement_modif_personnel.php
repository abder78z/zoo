<?php
session_start();
include("connexion.php");

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_de_naissance = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$fonction = $_POST['fonction'];
$login = $_POST['login'];
$mot_de_passe = $_POST['mot_de_passe'];
$salaire = $_POST['salaire'];

$sql = "UPDATE personnels
        SET nom='$nom',
            prenom='$prenom',
            date_de_naissance='$date_de_naissance',
            sexe='$sexe',
            fonction='$fonction',
            login='$login',
            mot_de_passe='$mot_de_passe',
            salaire='$salaire'
        WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: personnels.php");
exit();
?>