<?php
session_start();
include("connexion.php");

$id = $_POST['id'];
$pseudo = $_POST['pseudo'];
$reference_race = $_POST['reference_race'];
$date_de_naissance = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$commentaire = $_POST['commentaire'];

$sql = "UPDATE animaux 
        SET pseudo='$pseudo',
            reference_race='$reference_race',
            date_de_naissance='$date_de_naissance',
            sexe='$sexe',
            commentaire='$commentaire'
        WHERE id='$id'";

mysqli_query($conn, $sql);

if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "images/" . $image);

    mysqli_query($conn, "UPDATE animaux SET image='$image' WHERE id='$id'");
}

header("Location: animaux.php");
?>