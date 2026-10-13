<?php



require_once 'config/config.php';
// Charger les fonctions à partir des differents controleurs
require_once PATH_ROOT . '/controllers/adminAuth.php';
require_once PATH_ROOT . '/controllers/admin.php';
require_once PATH_ROOT . '/controllers/login.php';
require_once PATH_ROOT . '/controllers/signin.php';
require_once PATH_ROOT . '/controllers/home.php';
require_once PATH_ROOT . '/controllers/404.php';
require_once PATH_ROOT . '/controllers/logout.php';
require_once PATH_ROOT . '/controllers/creationrobot.php';
require_once PATH_ROOT . '/controllers/robotfinal.php';
require_once PATH_ROOT . '/controllers/listerobots.php';
require_once PATH_ROOT . '/controllers/supprimerrobot.php';
require_once PATH_ROOT . '/controllers/adminClients.php';
require_once PATH_ROOT . '/controllers/adminRobots.php';

// ROUTEUR
$action = $_GET['action'] ?? 'home';


// echo "Variables dans l'url apres ?action= " . $action;

if ($action === 'home') {
    homeAction();
} else if ($action === "login") {
    logIn();
} else if ($action === "signin") {
    signIn();
} else if ($action === "logout") {
    logoutAction();
} else if ($action === "creationrobot") {
    setRobot();
} else if ($action === "listerobots") {
    listerobotsAction();
} else if ($action === "supprimerrobot") {
    supprimerRobot();
} else if ($action === "admin") {
    adminAction();
} else if ($action === "adminclients") {
    adminClientsAction();
} else if ($action === "adminrobots") {
    adminRobotsAction();
} else if ($action === "robotfinal") {
    robotFinalAction();
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
