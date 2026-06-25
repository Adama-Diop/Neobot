<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/sql_connection.php';

$username = "";
$error_msg = "";

if (isset($_SESSION['client_id'])) {
    // connecté -> redirection vers la page d'accueil
    header('Location:' . URL);
    exit();
}

// connexion.php
if (isset($_POST["update"])) {

    // Vérification de la soumission du formulaire
    if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {

        $username = $_POST['pseudo'];
        $password = $_POST['mdp'];

        open_connection();

        $sql = "SELECT id, pseudo, mdp FROM Clients WHERE pseudo = ?";
        try {
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        } catch (mysqli_sql_exception $e) {
            $error_msg =  "Erreur SQL :  " . $e;
        }

        if (isset($result)) {

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['mdp'])) {
                    // Démarrage de la session
                    session_start();

                    // Stockage des informations utiles en session
                    $_SESSION['client_id'] = $user['id'];
                    $_SESSION['pseudo'] = $user['pseudo'];

                    // Redirection vers la page d'accueil
                    close_connection();
                    header('Location:' . URL);
                    exit();
                } else {
                    $error_msg =  "Mot de passe incorrect.";
                }
            } else {
                $error_msg =  "Compte inconnu.";
            }
        }

        close_connection();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>
    <h1>Se connecter</h1>
    <p> <?= $error_msg ?> </p>

    <form method="POST" action="">
        <img src="./img/logo neobot.png" alt="" width="50px" height="60px">
        <h2>NEOBOT</h2>

        <label>Pseudo</label>
        <input class="input" type="text" name="pseudo" value="<?= $username ?>"><br><br>

        <label>Mot de passe</label>
        <input class="input" type="mdp" name="mdp"><br><br>

        <input id="submit" type="submit" name="update" value="Se connecter">
        <a href="signin.php">Créer un compte</a>
    </form>

</body>

</html>