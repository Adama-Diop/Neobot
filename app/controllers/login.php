<?php

require_once PATH_ROOT . '/models/sql_connection.php';

function logIn()
{
    $username = "";
    $error_msg = "";
    // Démarrage de la session
    session_start();
    // Ce test ne passe pas on reste redirigé vers login (derriere URL il y a index.php )
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
            // Ici le ? sert a protéger des injections SQL garce au smtmt_bnd_parameter
            $sql = "SELECT id, pseudo, mdp, role FROM Clients WHERE pseudo = ?";
            try {
                $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
                // Si injection l'incstruction ci dessus bloque
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                // $result la requete SQL brute
                $result = mysqli_stmt_get_result($stmt);
            } catch (mysqli_sql_exception $e) {
                $error_msg =  "Erreur SQL :  " . $e;
            }

            if (isset($result)) {
                if (mysqli_num_rows($result) == 1) {
                    // Ici ûser contient le resiultat de la requete affiné
                    $user = mysqli_fetch_assoc($result);

                    if (password_verify($password, $user['mdp'])) {

                        // ici $user[id''] est bien rempli
                        // Stockage des informations utiles en session

                        $_SESSION['client_id'] = $user['id'];
                        $_SESSION['pseudo'] = $user['pseudo'];
                        $_SESSION['role'] = $user['role'];

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
    require_once PATH_ROOT . '/view/login.php';
}
