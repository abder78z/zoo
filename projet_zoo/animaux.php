<?php
session_start();
if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$recherche = "";
$sql = "SELECT animaux.*, especes.nom_race 
        FROM animaux
        INNER JOIN especes ON animaux.reference_race = especes.id";

if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $sql .= " WHERE pseudo LIKE '%$recherche%'";
}

$resultat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Animaux</title>
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
        <h1>Liste des animaux</h1>

        <form method="GET" action="animaux.php" class="form-recherche">
            <input type="text" name="recherche" placeholder="Rechercher un animal" value="<?php echo $recherche; ?>">
            <button type="submit">Rechercher</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Espèce</th>
                <th>Sexe</th>
                <th>Date de naissance</th>
                <th>Commentaire</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            <?php while ($animal = mysqli_fetch_assoc($resultat)) { ?>
                <tr>
                    <td><?php echo $animal['id']; ?></td>
                    <td><?php echo $animal['pseudo']; ?></td>
                    <td><?php echo $animal['nom_race']; ?></td>
                    <td><?php echo $animal['sexe']; ?></td>
                    <td><?php echo $animal['date_de_naissance']; ?></td>
                    <td><?php echo $animal['commentaire']; ?></td>
                    <td>
                        <?php if (!empty($animal['image'])) { ?>
                            <img src="images/<?php echo $animal['image']; ?>" width="80">
                        <?php } else { ?>
                            Pas d'image
                        <?php } ?>
                    </td>
                    <td>
                        <a href="modifier_animal.php?id=<?php echo $animal['id']; ?>">Modifier</a>
                        <a href="supprimer_animal.php?id=<?php echo $animal['id']; ?>" onclick="return confirm('Supprimer cet animal ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>