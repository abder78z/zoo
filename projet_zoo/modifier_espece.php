<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM especes WHERE id='$id'";
$resultat = mysqli_query($conn, $sql);
$espece = mysqli_fetch_assoc($resultat);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une espèce</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="conteneur">

    <div class="menu">
        <h2>Zoo</h2>
        <a href="accueil.php">Accueil</a>
        <a href="especes.php">Espèces</a>
        <a href="ajout_espece.php">Ajouter une espèce</a>
        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="contenu">
        <h1>Modifier une espèce</h1>

        <form action="traitement_modif_espece.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $espece['id']; ?>">

            <input type="text" name="nom_race" value="<?php echo $espece['nom_race']; ?>" required>

            <label>Type de nourriture :</label>
            <select name="type_nourriture" required>
                <option value="Carnivore" <?php if ($espece['type_nourriture'] == "Carnivore") echo "selected"; ?>>Carnivore</option>
                <option value="Herbivore" <?php if ($espece['type_nourriture'] == "Herbivore") echo "selected"; ?>>Herbivore</option>
                <option value="Omnivore" <?php if ($espece['type_nourriture'] == "Omnivore") echo "selected"; ?>>Omnivore</option>
            </select>

            <input type="number" name="duree_de_vie" value="<?php echo $espece['duree_de_vie']; ?>" required>

            <label>Animal aquatique :</label>
            <select name="animal_aquatique" required>
                <option value="1" <?php if ($espece['animal_aquatique'] == 1) echo "selected"; ?>>Oui</option>
                <option value="0" <?php if ($espece['animal_aquatique'] == 0) echo "selected"; ?>>Non</option>
            </select>

            <button type="submit">Modifier</button>
        </form>
    </div>

</div>

</body>
</html>