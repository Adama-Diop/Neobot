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

    $id_base = null;
    $id_head = null;
    $id_torso = null;
    $id_arm = null;
    $id_leg = null;
    $nom = null;
    $description = null;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        var_dump($_POST);

        if (isset($_POST['base'])) {
            $id_base = trim(htmlspecialchars($_POST['base']));
        }

        if (isset($_POST['head'])) {
            $id_head = trim(htmlspecialchars($_POST['head']));
        }

        if (isset($_POST['torso'])) {
            $id_torso = trim(htmlspecialchars($_POST['torso']));
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
        if ($id_base && $id_head && $id_torso && $id_arm && $id_leg && $nom && $description) {

            $date_creation = date('Y-m-d H:i:s');

            //require_once PATH_ROOT . '/view/robotfinal.php';
            set_robot($nom, $date_creation, $id_base, $id_head, $id_torso, $id_arm, $id_leg, $_SESSION['client_id'], $description);
        }
    }


    $basesRobots = [
        [
            "id" => "1",
            "nom" => "Bipède",
            "img" => "./view/img/rendu-robot-final.png",
            "desc" => "Classique et équilibré, parfait pour toutes les aventures."
        ],
        [
            "id" => "2",
            "nom" => "Bipède",
            "img" => "./view/img/rendu-robot-final.png",
            "desc" => "Classique et équilibré, parfait pour toutes les aventures."
        ],
        [
            "id" => "3",
            "nom" => "Bipède",
            "img" => "./view/img/rendu-robot-final.png",
            "desc" => "Classique et équilibré, parfait pour toutes les aventures."
        ]
    ];

    $robotHeads = [
        [
            "id" => "1",
            "img" => "./view/img/tete-violet1.png",
            "desc" => "Classique et souriante, avec une petite antenne."
        ],
        [
            "id" => "2",
            "img" => "./view/img/tete-violet2.png",
            "desc" => "Dynamique avec une visière originale et expressive."
        ],
        [
            "id" => "3",
            "img" => "./view/img/tete-violet3.png",
            "desc" => "Moderne avec deux grands yeux lumineux."
        ],
        [
            "id" => "4",
            "img" => "./view/img/tete-violet4.png",
            "desc" => "Minimaliste avec un écran large et élégant."
        ],
        [
            "id" => "5",
            "img" => "./view/img/tete-violet5.png",
            "desc" => "Futuriste avec une forme ronde et un œil central."
        ],
        [
            "id" => "6",
            "img" => "./view/img/tete-violet6.png",
            "desc" => "Adorable avec des oreilles de chat."
        ]
    ];

    $robotTorsos = [
        [
            "id" => "1",
            "img" => "./view/img/torse-violet1.png",
            "desc" => "Compact et arrondi, idéal pour un robot classique."
        ],
        [
            "id" => "2",
            "img" => "./view/img/torse-violet2.png",
            "desc" => "Armure renforcée pour un look plus robuste."
        ],
        [
            "id" => "3",
            "img" => "./view/img/torse-violet3.png",
            "desc" => "Corps sphérique avec un cœur lumineux central."
        ],
        [
            "id" => "4",
            "img" => "./view/img/torse-violet4.png",
            "desc" => "Design moderne avec une large protection frontale."
        ],
        [
            "id" => "5",
            "img" => "./view/img/torse-violet5.png",
            "desc" => "Léger et élégant avec une silhouette sportive."
        ],
        [
            "id" => "6",
            "img" => "./view/img/torse-violet6.png",
            "desc" => "Corps renforcé avec un panneau lumineux."
        ]
    ];

    $robotArms = [
        [
            "id" => "1",
            "img" => "./view/img/bras-violet1.png",
            "desc" => "Simple et polyvalent pour un usage quotidien."
        ],
        [
            "id" => "2",
            "img" => "./view/img/bras-violet2.png",
            "desc" => "Bras articulé offrant une grande mobilité."
        ],
        [
            "id" => "3",
            "img" => "./view/img/bras-violet3.png",
            "desc" => "Bras robuste conçu pour les tâches physiques."
        ],
        [
            "id" => "4",
            "img" => "./view/img/bras-violet4.png",
            "desc" => "Bras fin et précis pour les travaux délicats."
        ],
        [
            "id" => "5",
            "img" => "./view/img/bras-violet5.png",
            "desc" => "Main en pince pour saisir facilement les objets."
        ],
        [
            "id" => "6",
            "img" => "./view/img/bras-violet6.png",
            "desc" => "Main articulée avec cinq doigts pour plus de précision."
        ]
    ];

    $robotLegs = [
        [
            "id" => "1",
            "img" => "./view/img/jambes-violet1.png",
            "desc" => "Grandes jambes stables pour un robot robuste."
        ],
        [
            "id" => "2",
            "img" => "./view/img/jambes-violet2.png",
            "desc" => "Jambes fines et classiques pour un look élégant."
        ],
        [
            "id" => "3",
            "img" => "./view/img/jambes-violet3.png",
            "desc" => "Jambes puissantes avec des pieds larges."
        ],
        [
            "id" => "4",
            "img" => "./view/img/jambes-violet4.png",
            "desc" => "Jambes légères et rapides pour plus d'agilité."
        ],
        [
            "id" => "5",
            "img" => "./view/img/jambes-violet5.png",
            "desc" => "Roues intégrées pour des déplacements rapides."
        ],
        [
            "id" => "6",
            "img" => "./view/img/jambes-violet6.png",
            "desc" => "Trois pieds articulés pour une excellente stabilité."
        ]
    ];

    require_once PATH_ROOT . "/view/creationrobot.php";
}
