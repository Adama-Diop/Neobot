<?php

require_once PATH_ROOT . '/models/sql_connection.php';

function signIn()
{
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
                $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

                // "sss" signifie trois paramètres de type string
                mysqli_stmt_bind_param($stmt, "sss", $username, $hash, $email);

                // Exécution et gestion du succès/échec
                if (mysqli_stmt_execute($stmt)) {
                    header('Location:' . URL . "/index.php?action=login");
                    exit();
                    // $msg = "Inscription réussie ! <a href='login'>Connectez-vous</a>";
                } else {
                    $msg = "Erreur : " . mysqli_error($GLOBALS['connection']);
                }
                close_connection();
            }
        }
    }
    require_once PATH_ROOT . '/view/signin.php';
}
