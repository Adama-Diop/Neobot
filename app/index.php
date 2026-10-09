<?php



require_once 'config/config.php';
// Charger les fonctions à partir des differents controleurs
require_once PATH_ROOT . '/controllers/login.php';
require_once PATH_ROOT . '/controllers/home.php';
require_once PATH_ROOT . '/controllers/404.php';
require_once PATH_ROOT . '/controllers/logout.php';
require_once PATH_ROOT . '/controllers/creationrobot.php';
require_once PATH_ROOT . '/controllers/listerobots.php';

// ROUTEUR
$action = $_GET['action'] ?? 'home';


// echo "Variables dans l'url apres ?action= " . $action;

if ($action === 'home') {
    homeAction();
} else if ($action === "login") {
    logIn();
} else if ($action === "logout") {
    logoutAction();
} else if ($action === "creationrobot") {
    setRobot();
} else if ($action === "listerobots") {
    listerobotsAction();
} else {
    p404Action();
}
// listerobotsAction

// Alternative au if else if
// switch ($action) {
//     case "login":
//         logIn();
//         break;
//     case "home":
//         homeAction();
//         break;
//     default:
//         p404Action();
//         break;;
// }
