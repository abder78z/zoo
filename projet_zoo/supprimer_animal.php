<?php
session_start();
include("connexion.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM animaux WHERE id='$id'");

header("Location: animaux.php");
?>