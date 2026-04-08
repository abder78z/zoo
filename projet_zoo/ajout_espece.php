<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une espèce</title>
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
        <h1>Ajouter une espèce</h1>

        <form action="traitement_ajout_espece.php" method="POST">
            <input type="text" name="nom_race" placeholder="Nom de la race" required>

            <label>Type de nourriture :</label>
            <select name="type_nourriture" required>
                <option value="">Choisir</option>
                <option value="Carnivore">Carnivore</option>
                <option value="Herbivore">Herbivore</option>
                <option value="Omnivore">Omnivore</option>
            </select>

            <input type="number" name="duree_de_vie" placeholder="Durée de vie moyenne" required>

            <label>Animal aquatique :</label>
            <select name="animal_aquatique" required>
                <option value="">Choisir</option>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</div>

</body>
</html>