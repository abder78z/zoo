<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM personnels WHERE id='$id'";
$resultat = mysqli_query($conn, $sql);
$personne = mysqli_fetch_assoc($resultat);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un personnel</title>
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
        <h1>Modifier un personnel</h1>

        <form action="traitement_modif_personnel.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $personne['id']; ?>">

            <input type="text" name="nom" value="<?php echo $personne['nom']; ?>" required>
            <input type="text" name="prenom" value="<?php echo $personne['prenom']; ?>" required>

            <label>Date de naissance :</label>
            <input type="date" name="date_de_naissance" value="<?php echo $personne['date_de_naissance']; ?>" required>

            <label>Sexe :</label>
            <select name="sexe" required>
                <option value="H" <?php if ($personne['sexe'] == "H") echo "selected"; ?>>Homme</option>
                <option value="F" <?php if ($personne['sexe'] == "F") echo "selected"; ?>>Femme</option>
            </select>

            <label>Fonction :</label>
            <select name="fonction" required>
                <option value="Employe" <?php if ($personne['fonction'] == "Employe") echo "selected"; ?>>Employé</option>
                <option value="Directeur" <?php if ($personne['fonction'] == "Directeur") echo "selected"; ?>>Directeur</option>
            </select>

            <input type="text" name="login" value="<?php echo $personne['login']; ?>" required>
            <input type="text" name="mot_de_passe" value="<?php echo $personne['mot_de_passe']; ?>" required>
            <input type="number" step="0.01" name="salaire" value="<?php echo $personne['salaire']; ?>" required>

            <button type="submit">Modifier</button>
        </form>
    </div>

</div>

</body>
</html>