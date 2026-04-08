<?php
session_start();
if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$id = $_GET['id'];

$animal_req = mysqli_query($conn, "SELECT * FROM animaux WHERE id='$id'");
$animal = mysqli_fetch_assoc($animal_req);

$especes = mysqli_query($conn, "SELECT * FROM especes");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un animal</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="conteneur">

    <div class="menu">
        <h2>Zoo</h2>
        <a href="accueil.php">Accueil</a>
        <a href="animaux.php">Animaux</a>
        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="contenu">
        <h1>Modifier un animal</h1>

        <form action="traitement_modif_animal.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">

            <input type="text" name="pseudo" value="<?php echo $animal['pseudo']; ?>" required>

            <select name="reference_race" required>
                <?php while ($e = mysqli_fetch_assoc($especes)) { ?>
                    <option value="<?php echo $e['id']; ?>" <?php if ($animal['reference_race'] == $e['id']) echo "selected"; ?>>
                        <?php echo $e['nom_race']; ?>
                    </option>
                <?php } ?>
            </select>

            <input type="date" name="date_de_naissance" value="<?php echo $animal['date_de_naissance']; ?>">

            <select name="sexe">
                <option value="M" <?php if ($animal['sexe'] == "M") echo "selected"; ?>>M</option>
                <option value="F" <?php if ($animal['sexe'] == "F") echo "selected"; ?>>F</option>
            </select>

            <textarea name="commentaire"><?php echo $animal['commentaire']; ?></textarea>

            <input type="file" name="image">

            <button type="submit">Modifier</button>
        </form>
    </div>

</div>

</body>
</html>