<?php
require_once PATH_ROOT . "/models/robotModel.php";

function setRobot()
{

    session_start();

    if (!isset($_SESSION['client_id'])) {
        // Pas connecté -> redirection vers la page de connexion
        header('Location: ' . URL . '/?action=login');
        // return;
        exit();
    }
    $robot_existant = null;
    $fonctionnalites_selectionnees = [];
    if (isset($_GET['robot'])) {

        $id_robot = (int) $_GET['robot'];
        $robot_existant = get_robot_by_id($id_robot);

        if (!$robot_existant) {
            http_response_code(404);
            exit("Robot introuvable.");
        }

        if ($robot_existant['id_client'] != $_SESSION['client_id']) {
            http_response_code(403);
            exit("Vous n'avez pas le droit de modifier ce robot.");
        }

        $fonctionnalites_selectionnees = get_fonctionnalites_robot(
            (int)$robot_existant['id']
        );
    }

    $id_base = null;
    $id_head = null;
    $id_body = null;
    $id_arm = null;
    $id_leg = null;
    $nom = null;
    $description = null;

    $all_bases = get_all_bases();
    $all_heads = get_all_heads();
    $all_arms = get_all_arms();
    $all_bodies = get_all_bodies();
    $all_legs = get_all_legs();
    $all_fonctionnalites = get_all_fonctionnalites();
    $couleur_tete = 'bleu';
    $couleur_corps = 'bleu';
    $couleur_bras = 'bleu';
    $couleur_jambes = 'bleu';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $couleurs_autorisees = [
            'bleu',
            'jaune',
            'rose',
            'rouge',
            'vert',
            'violet'
        ];

        $couleur_tete = $_POST['couleur_tete'] ?? 'bleu';
        $couleur_corps = $_POST['couleur_corps'] ?? 'bleu';
        $couleur_bras = $_POST['couleur_bras'] ?? 'bleu';
        $couleur_jambes = $_POST['couleur_jambes'] ?? 'bleu';

        foreach (
            [
                &$couleur_tete,
                &$couleur_corps,
                &$couleur_bras,
                &$couleur_jambes
            ] as &$couleur
        ) {
            if (!in_array($couleur, $couleurs_autorisees, true)) {
                $couleur = 'bleu';
            }
        }
        unset($couleur);

        $fonctionnalites_post = $_POST['fonctionnalites'] ?? [];

        $fonctionnalites_selectionnees = array_map(
            'intval',
            $_POST['fonctionnalites'] ?? []
        );

        if (isset($_POST['base'])) {
            $id_base = trim(htmlspecialchars($_POST['base']));
        }

        if (isset($_POST['head'])) {
            $id_head = trim(htmlspecialchars($_POST['head']));
        }

        if (isset($_POST['body'])) {
            $id_body = trim(htmlspecialchars($_POST['body']));
        }

        if (isset($_POST['arm'])) {
            $id_arm = trim(htmlspecialchars($_POST['arm']));
        }

        if (isset($_POST['leg'])) {
            $id_leg = trim(htmlspecialchars($_POST['leg']));
        }

        if (isset($_POST['nom'])) {
            $nom = trim(htmlspecialchars($_POST['nom']));
        }

        if (isset($_POST['description'])) {
            $description = trim(htmlspecialchars($_POST['description']));
        }

        // Vérification de la soumission du formulaire
        if (
            $id_base !== null && $id_base !== '' &&
            $id_head !== null && $id_head !== '' &&
            $id_body !== null && $id_body !== '' &&
            $id_arm !== null && $id_arm !== '' &&
            $id_leg !== null && $id_leg !== '' &&
            $nom !== null && $nom !== ''
        ) {
            if (isset($_POST['robot_id']) && (int)$_POST['robot_id'] > 0) {
                // Modification d'un robot existant
                $id_robot = (int)$_POST['robot_id'];

                $result = update_robot(
                    $id_robot,
                    $nom,
                    $id_base,
                    $id_head,
                    $id_body,
                    $id_arm,
                    $id_leg,
                    $_SESSION['client_id'],
                    $description,
                    $couleur_tete,
                    $couleur_corps,
                    $couleur_bras,
                    $couleur_jambes
                );
                $id_robot_final = $id_robot;
            } else {
                // Création d'un nouveau robot
                $date_creation = date('Y-m-d H:i:s');

                $id_robot_final = set_robot(
                    $nom,
                    $date_creation,
                    $id_base,
                    $id_head,
                    $id_body,
                    $id_arm,
                    $id_leg,
                    $_SESSION['client_id'],
                    $description,
                    $couleur_tete,
                    $couleur_corps,
                    $couleur_bras,
                    $couleur_jambes
                );
                $result = ($id_robot_final !== false);
            }

            if ($result) {

                // 1. Enregistrer les fonctionnalités cochées
                $fonctionnalites_ok = enregistrer_fonctionnalites_robot(
                    $id_robot_final,
                    $fonctionnalites_selectionnees
                );

                if (!$fonctionnalites_ok) {
                    echo "Erreur lors de l'enregistrement des fonctionnalités.";
                    return;
                }

                // 2. Récupérer le robot enregistré
                $robot_existant = get_robot_by_id($id_robot_final);

                if (
                    !$robot_existant ||
                    (int)$robot_existant['id_client'] !== (int)$_SESSION['client_id']
                ) {
                    http_response_code(403);
                    exit("Impossible d'afficher ce robot.");
                }

                // 3. Charger les pièces pour afficher leurs descriptions
                $all_bases = get_all_bases();
                $all_heads = get_all_heads();
                $all_bodies = get_all_bodies();
                $all_arms = get_all_arms();
                $all_legs = get_all_legs();

                // 4. Calculer les prix
                $prix_pieces = get_prix_pieces_robot($id_robot_final);
                $prix_fonctionnalites = get_prix_fonctionnalites_robot($id_robot_final);

                $prix_total = 0;

                if ($prix_pieces) {
                    $prix_total =
                        (float) $prix_pieces['prix_base']
                        + (float) $prix_pieces['prix_tete']
                        + (float) $prix_pieces['prix_corps']
                        + (float) $prix_pieces['prix_bras']
                        + (float) $prix_pieces['prix_jambes'];
                }

                $prix_total += (float) $prix_fonctionnalites;

                // 5. Récupérer les fonctionnalités sélectionnées
                $fonctionnalites_selectionnees = get_fonctionnalites_robot(
                    (int)$robot_existant['id']
                );

                $details_fonctionnalites = get_details_fonctionnalites_robot($id_robot_final);

                // Rediriger vers la page finale après l'enregistrement
                header('Location: ' . URL . '/?action=robotfinal&id=' . (int)$id_robot_final);
                exit();
            }
        }
    }

    require_once PATH_ROOT . "/view/creationrobot.php";
}
