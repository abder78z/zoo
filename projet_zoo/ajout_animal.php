<?php
session_start();
if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");
$especes = mysqli_query($conn, "SELECT * FROM especes");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un animal</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="conteneur">

    <div class="menu">
        <h2>Zoo</h2>
        <a href="accueil.php">Accueil</a>
        <a href="animaux.php">Animaux</a>
        <a href="ajout_animal.php">Ajouter un animal</a>
        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="contenu">
        <h1>Ajouter un animal</h1>

        <form action="traitement_ajout_animal.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="pseudo" placeholder="Nom de l'animal" required>

            <select name="reference_race" required>
                <option value="">Choisir une espèce</option>
                <?php while ($e = mysqli_fetch_assoc($especes)) { ?>
                    <option value="<?php echo $e['id']; ?>"><?php echo $e['nom_race']; ?></option>
                <?php } ?>
            </select>

            <input type="date" name="date_de_naissance">

            <select name="sexe">
                <option value="">Choisir le sexe</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>

            <textarea name="commentaire" placeholder="Commentaire"></textarea>

            <input type="file" name="image">

            <button type="submit">Ajouter</button>
        </form>
    </div>

</div>

</body>
</html>