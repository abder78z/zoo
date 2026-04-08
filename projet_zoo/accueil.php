<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$sql_animaux = "SELECT COUNT(*) AS total_animaux FROM animaux";
$resultat_animaux = mysqli_query($conn, $sql_animaux);
$donnees_animaux = mysqli_fetch_assoc($resultat_animaux);
$total_animaux = $donnees_animaux['total_animaux'];
$sql_especes = "SELECT COUNT(*) AS total_especes FROM especes";
$resultat_especes = mysqli_query($conn, $sql_especes);
$donnees_especes = mysqli_fetch_assoc($resultat_especes);
$total_especes = $donnees_especes['total_especes'];
$total_personnels = 0;

if ($_SESSION['fonction'] == "Directeur") {
    $sql_personnels = "SELECT COUNT(*) AS total_personnels FROM personnels";
    $resultat_personnels = mysqli_query($conn, $sql_personnels);
    $donnees_personnels = mysqli_fetch_assoc($resultat_personnels);
    $total_personnels = $donnees_personnels['total_personnels'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Zoo</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="conteneur">

    <div class="menu">
        <h2>Zoo</h2>
        <a href="accueil.php">Accueil</a>
        <a href="animaux.php">Animaux</a>
        <a href="especes.php">Espèces</a>

        <?php
        if ($_SESSION['fonction'] == "Directeur") {
            echo '<a href="personnels.php">Employés</a>';
        }
        ?>

        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="contenu">
        <h1>Bienvenue <?php echo $_SESSION['prenom']; ?></h1>
        <p>Vous êtes connecté au site du zoo.</p>

        <div class="stats">
            <div class="carte">
                <h3>Animaux</h3>
                <p><?php echo $total_animaux; ?></p>
            </div>

            <div class="carte">
                <h3>Espèces</h3>
                <p><?php echo $total_especes; ?></p>
            </div>

            <?php
            if ($_SESSION['fonction'] == "Directeur") {
                echo '
                <div class="carte">
                    <h3>Employés</h3>
                    <p>' . $total_personnels . '</p>
                </div>
                ';
            }
            ?>
        </div>
    </div>

</div>

</body>
</html>