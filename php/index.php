<?php

$greet_msg = "";
session_start();
if (!isset($_SESSION['client_id'])) {
    // Pas connecté -> redirection vers la page de connexion
    header('Location: login.php');
    exit();
} else {
    $greet_msg = "Bienvenue, " . $_SESSION['pseudo'] . " !";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoBot</title>
    <link rel="stylesheet" href="./css/mes_robots.css">
    <script src="https://kit.fontawesome.com/7e24d25313.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="container">
        <section class="side-bar">
            <div class="logo">
                <img src="./img/logo neobot.png" alt="logo" width="30px" height="35px">
                <h1>NEOBOT</h1>
            </div>
            <div class="liens">
                <a href="#">
                    🏠
                    <span>Accueil</span>
                </a>
                <a href="#">
                    💡
                    <span>Inspirations</span>
                </a>
                <a href="#">
                    ⚙️
                    <span>Paramètres</span>
                </a>
            </div>
            <hr>
            <div class="connexion">
                <img src="./img/undraw_profile-pic_fatv.png" alt="photo de profil">
                <a href="http://localhost/neobot/logout.php">Se déconnecter</a>
                <a href="http://localhost/neobot/achatrobot.php">Voir mes achats</a>
            </div>
        </section>

        <section class="robots-container">
            <div class="mes-robots">
                <h2>Mes Robots</h2>
                <a href="http://localhost/neobot/creationrobot.php">➕ Créer un robot</a>
            </div>
            <p>Retrouvez ici tous les robots que vous avez créés.</p>
            <p>Modifiez-les, supprimez-les ou mettez-les en production.</p>

            <div class="etat-robots">
                <p class="etat b">Brouillon</p>
                <p class="etat p">En production</p>
                <p class="etat f">Finalisée</p>
            </div>
            <div class="liste-robots">
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/rendu-robot-final.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <a href="#">
                            🖋️
                            <span>Modifier</span>
                        </a>
                        <a href="#">
                            🗑️
                            <span>Supprimer</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>