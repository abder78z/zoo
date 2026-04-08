<?php
session_start();
include("connexion.php");

$nom_race = $_POST['nom_race'];
$type_nourriture = $_POST['type_nourriture'];
$duree_de_vie = $_POST['duree_de_vie'];
$animal_aquatique = $_POST['animal_aquatique'];

$sql = "INSERT INTO especes (nom_race, type_nourriture, duree_de_vie, animal_aquatique)
        VALUES ('$nom_race', '$type_nourriture', '$duree_de_vie', '$animal_aquatique')";

mysqli_query($conn, $sql);

header("Location: especes.php");
exit();
?>