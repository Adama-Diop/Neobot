<?php

require_once PATH_ROOT . '/models/adminModel.php';
require_once PATH_ROOT . '/controllers/adminAuth.php';

function adminRobotsAction()
{
    verifierAdmin();

    $id_client = filter_input(INPUT_GET, 'client', FILTER_VALIDATE_INT);

    if (!$id_client || $id_client <= 0) {
        http_response_code(400);
        exit("Identifiant client invalide.");
    }

    $robots = getDetailsRobotsParClient($id_client);

    if ($robots === false) {
        http_response_code(500);
        exit("Impossible de récupérer les robots.");
    }

    require PATH_ROOT . '/view/admin/robots.php';
}
