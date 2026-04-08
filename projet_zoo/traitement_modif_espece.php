<?php
session_start();
include("connexion.php");

$id = $_POST['id'];
$nom_race = $_POST['nom_race'];
$type_nourriture = $_POST['type_nourriture'];
$duree_de_vie = $_POST['duree_de_vie'];
$animal_aquatique = $_POST['animal_aquatique'];

$sql = "UPDATE especes
        SET nom_race='$nom_race',
            type_nourriture='$type_nourriture',
            duree_de_vie='$duree_de_vie',
            animal_aquatique='$animal_aquatique'
        WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: especes.php");
exit();
?>