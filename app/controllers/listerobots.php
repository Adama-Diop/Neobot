<?php

require_once PATH_ROOT . "/models/robotModel.php";

function listerobotsAction()
{
    session_start();

    if (!isset($_SESSION['client_id'])) {
        // Pas connecté -> redirection vers la page de connexion
        header('Location: ' . URL . '/?action=login');
        // return;
        exit();
    }
    // Appel au Model pour selectionner les robots

    $robots = get_all_robots_by_client_id($_SESSION['client_id']);

    require_once PATH_ROOT . "/view/listerobots.php";
}
