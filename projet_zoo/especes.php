<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$sql = "SELECT * FROM especes";
$resultat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espèces</title>
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
        <h1>Liste des espèces</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nom de la race</th>
                <th>Type de nourriture</th>
                <th>Durée de vie</th>
                <th>Aquatique</th>
                <th>Actions</th>
            </tr>

            <?php while ($espece = mysqli_fetch_assoc($resultat)) { ?>
                <tr>
                    <td><?php echo $espece['id']; ?></td>
                    <td><?php echo $espece['nom_race']; ?></td>
                    <td><?php echo $espece['type_nourriture']; ?></td>
                    <td><?php echo $espece['duree_de_vie']; ?> ans</td>
                    <td>
                        <?php
                        if ($espece['animal_aquatique'] == 1) {
                            echo "Oui";
                        } else {
                            echo "Non";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="modifier_espece.php?id=<?php echo $espece['id']; ?>">Modifier</a>
                        <a href="supprimer_espece.php?id=<?php echo $espece['id']; ?>" onclick="return confirm('Supprimer cette espèce ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>