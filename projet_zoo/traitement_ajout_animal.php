<?php
session_start();
include("connexion.php");

$pseudo = $_POST['pseudo'];
$reference_race = $_POST['reference_race'];
$date_de_naissance = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$commentaire = $_POST['commentaire'];

$image = "";

if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "images/" . $image);
}

$sql = "INSERT INTO animaux (reference_race, date_de_naissance, sexe, pseudo, commentaire, image)
        VALUES ('$reference_race', '$date_de_naissance', '$sexe', '$pseudo', '$commentaire', '$image')";

mysqli_query($conn, $sql);

header("Location: animaux.php");
?>