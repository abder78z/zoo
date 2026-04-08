<?php
session_start();
include("connexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM personnels WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: personnels.php");
exit();
?>