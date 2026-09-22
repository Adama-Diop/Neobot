<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/sql_connection.php';

$username = "";
$email = "";
$msg = "";

if (isset($_POST["update"])) {

    // Vérification de la soumission du formulaire
    if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {

        $username = $_POST['pseudo'];
        $email = $_POST['email'];

        if (empty($username) || empty($email) || empty($_POST['mdp'])) {
            $msg = "Tous les champs sont obligatoires.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "L'adresse email n'est pas valide.";
        } else {
            // ouvre la connexion et la stocke dans la variable $connection
            open_connection();
            // Hachage sécurisé du mot de passe
            $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO Clients (pseudo, mdp, email) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($connection, $sql);

            // "sss" signifie trois paramètres de type string
            mysqli_stmt_bind_param($stmt, "sss", $username, $hash, $email);

            // Exécution et gestion du succès/échec
            if (mysqli_stmt_execute($stmt)) {
                $msg = "Inscription réussie ! <br><br><br> <a href='login.php'>Connectez-vous</a>";
            } else {
                $msg = "Erreur : " . mysqli_error($connection);
            }
            close_connection();
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>
    <h1>Créer un compte</h1>
    <p> <?= $msg ?> </p>
    <form method="POST" action="">

        <img src="./img/logo neobot.png" alt="" width="50px" height="60px">
        <h2>NEOBOT</h2>
        <label>Pseudo</label>
        <input type="text" name="pseudo" value="<?= $username ?>"><br><br>

        <label>Email</label>
        <input type="email" name="email" placeholder="exemple@gmail.com" required value="<?= $email ?>"><br><br>

        <label>Mot de passe</label>
        <input type="mdp" name="mdp" required><br><br>

        <input id="submit" type="submit" name="update" value="S'inscrire">
        <a href="login.php">J'ai déjà un compte</a>
    </form>
    <br>
</body>

</html>