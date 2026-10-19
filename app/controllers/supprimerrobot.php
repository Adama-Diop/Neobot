<?php

require_once PATH_ROOT . "/models/robotModel.php";

function supprimerRobot()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (empty($_SESSION['client_id'])) {
        // requiert une authentification
        http_response_code(401);
        exit("Vous devez être connecté.");
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // méthode interdite
        http_response_code(405);
        exit("Méthode non autorisée.");
    }

    $id_robot = filter_input(
        INPUT_POST,
        'robot_id',
        FILTER_VALIDATE_INT
    );

    if (!$id_robot || $id_robot <= 0) {
        // mauvaise requete
        http_response_code(400);
        exit("Identifiant du robot invalide.");
    }

    $resultat = supprimer_robot(
        $id_robot,
        (int) $_SESSION['client_id']
    );

    if (!$resultat) {
        http_response_code(400);
        exit("La suppression a échoué. Vérifiez le robot et ses dépendances.");
    }

    header("Location: " . URL . "/?action=listerobots");
    exit;
}
