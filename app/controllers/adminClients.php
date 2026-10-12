<?php

require_once PATH_ROOT . '/models/adminModel.php';
require_once PATH_ROOT . '/controllers/adminAuth.php';

function adminClientsAction()
{
    verifierAdmin();

    $clients = getTousLesClients();

    if ($clients === false) {
        http_response_code(500);
        exit("Impossible de récupérer la liste des clients.");
    }

    require PATH_ROOT . '/view/admin/clients.php';
}
