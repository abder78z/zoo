<?php
session_start();

if (!isset($_SESSION['prenom'])) {
    header("Location: login.php");
    exit();
}

include("connexion.php");

$sql = "SELECT * FROM personnels";
$resultat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Personnel</title>
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
        <h1>Liste du personnel</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Sexe</th>
                <th>Login</th>
                <th>Fonction</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>

            <?php while ($personne = mysqli_fetch_assoc($resultat)) { ?>
                <tr>
                    <td><?php echo $personne['id']; ?></td>
                    <td><?php echo $personne['nom']; ?></td>
                    <td><?php echo $personne['prenom']; ?></td>
                    <td><?php echo $personne['date_de_naissance']; ?></td>
                    <td><?php echo $personne['sexe']; ?></td>
                    <td><?php echo $personne['login']; ?></td>
                    <td><?php echo $personne['fonction']; ?></td>
                    <td><?php echo $personne['salaire']; ?></td>
                    <td>
                        <a href="modifier_personnel.php?id=<?php echo $personne['id']; ?>">Modifier</a>
                        <a href="supprimer_personnel.php?id=<?php echo $personne['id']; ?>" onclick="return confirm('Supprimer ce personnel ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>