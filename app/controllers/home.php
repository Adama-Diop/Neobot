<?php

function homeAction()
{
    session_start();
    if (!isset($_SESSION['client_id'])) {
        // Pas connecté -> redirection vers la page de connexion
        header('Location: ' . URL . '/?action=login');
        // return;
        exit();
    }

    require_once PATH_ROOT . '/view/homeView.php';
}
