<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/admin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Document</title>
</head>

<body>

    <div>
        <i class="fi fi-rr-arrow-small-left"></i>
        <a href="<?= URL ?>/?action=home" class="home-link">Retour vers l'accueil</a>
    </div>

    <div class="admin-container">
        <h1>Administration NeoBot</h1>

        <p>Bienvenue dans ton espace administrateur.</p>

        <nav class="admin-menu">
            <ul>
                <li>
                    <a href="<?= htmlspecialchars(URL . '/?action=adminclients', ENT_QUOTES, 'UTF-8') ?>">
                        Gestion des clients
                    </a>
                </li>
                <li>
                    <a href="<?= htmlspecialchars(URL) ?>/?action=adminrobots">
                        Gestion des robots
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>