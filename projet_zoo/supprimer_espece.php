<?php
session_start();
include("connexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM especes WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: especes.php");
exit();
?>