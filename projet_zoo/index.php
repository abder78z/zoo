<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="fond-noir"></div>

    <div class="login">
        <h1>Zoo</h1>
        <p>Connexion</p>

        <form action="verif_login.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>

        <?php
        if (isset($_GET['erreur'])) {
            echo "<p class='erreur'>Login ou mot de passe faux</p>";
        }
        ?>
    </div>

</body>
</html>
