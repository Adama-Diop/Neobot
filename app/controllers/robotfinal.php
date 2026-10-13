<?php

function robotFinalAction()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // Vérifier que le client est connecté
    if (empty($_SESSION['client_id'])) {
        header('Location: ' . URL . '/?action=login');
        exit();
    }

    // Récupérer l'identifiant du robot dans l'URL
    $id_robot = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id_robot || $id_robot <= 0) {
        http_response_code(400);
        exit("Identifiant du robot invalide.");
    }

    // Récupérer le robot
    $robot_existant = get_robot_by_id($id_robot);

    if (!$robot_existant) {
        http_response_code(404);
        exit("Robot introuvable.");
    }

    // Vérifier que le robot appartient au client connecté
    if ((int)$robot_existant['id_client'] !== (int)$_SESSION['client_id']) {
        http_response_code(403);
        exit("Vous n'avez pas le droit de consulter ce robot.");
    }

    // Charger les pièces et les fonctionnalités
    $all_bases = get_all_bases();
    $all_heads = get_all_heads();
    $all_bodies = get_all_bodies();
    $all_arms = get_all_arms();
    $all_legs = get_all_legs();

    $fonctionnalites_selectionnees = get_fonctionnalites_robot($id_robot);
    $details_fonctionnalites = get_details_fonctionnalites_robot($id_robot);

    // Calculer les prix
    $prix_pieces = get_prix_pieces_robot($id_robot);
    $prix_fonctionnalites = get_prix_fonctionnalites_robot($id_robot);

    $prix_total = 0;

    if ($prix_pieces) {
        $prix_total =
            (float)$prix_pieces['prix_base']
            + (float)$prix_pieces['prix_tete']
            + (float)$prix_pieces['prix_corps']
            + (float)$prix_pieces['prix_bras']
            + (float)$prix_pieces['prix_jambes'];
    }

    $prix_total += (float)$prix_fonctionnalites;

    // Afficher la page finale
    require PATH_ROOT . '/view/robotfinal.php';
}
