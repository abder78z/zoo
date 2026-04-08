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
    <title>Ajouter un personnel</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="conteneur">

    <div class="menu">
        <h2>Zoo</h2>
        <a href="accueil.php">Accueil</a>
        <a href="personnels.php">Personnel</a>
        <a href="ajout_personnel.php">Ajouter un personnel</a>
        <a href="logout.php">Déconnexion</a>
    </div>

    <div class="contenu">
        <h1>Ajouter un personnel</h1>

        <form action="traitement_ajout_personnel.php" method="POST">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prénom" required>

            <label>Date de naissance :</label>
            <input type="date" name="date_de_naissance" required>

            <label>Sexe :</label>
            <select name="sexe" required>
                <option value="">Choisir</option>
                <option value="H">Homme</option>
                <option value="F">Femme</option>
            </select>

            <label>Fonction :</label>
            <select name="fonction" required>
                <option value="">Choisir</option>
                <option value="Employe">Employé</option>
                <option value="Directeur">Directeur</option>
            </select>

            <input type="text" name="login" placeholder="Identifiant" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <input type="number" step="0.01" name="salaire" placeholder="Salaire" required>

            <button type="submit">Ajouter</button>
        </form>
    </div>

</div>

</body>
</html>