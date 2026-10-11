<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de votre robot</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/robotfinal.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
</head>

<body>
    <header class="fixed-navbar">
        <a href="" class="burger"><i class="fi fi-br-menu-burger"></i></a>
        <a href="" class="close"><i class="fi fi-br-cross"></i></a>
        <div class="fixed-navbar-show-hide">
            <div class="logo">
                <img src="../img/logoNeo.png" alt="logo">
            </div>
            <nav class="navbar-links">
                <div class="link">
                    <i class="fi fi-bs-home"></i>
                    <a href="">Accueil</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-bulb"></i>
                    <a href="">Inspiration</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">Paramètres</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <main class="main-container">
            <h2>
                Voici la version finale de
                <span class="robot-name">
                    <?= htmlspecialchars($robot_existant['nom'], ENT_QUOTES, 'UTF-8') ?>
                </span>
            </h2>
            <div class="debrief-container">
                <img src="../img/rendu-robot-final2.png" alt="Visuel final du robot">
                <section class="debrief">
                    <h3>Récapitulatif de votre création</h3>

                    <?php
                    $etapes = [
                        ['nom' => 'Base', 'colonne' => 'id_base', 'pieces' => $all_bases],
                        ['nom' => 'Tête', 'colonne' => 'id_tete', 'pieces' => $all_heads],
                        ['nom' => 'Corps', 'colonne' => 'id_corps', 'pieces' => $all_bodies],
                        ['nom' => 'Bras', 'colonne' => 'id_bras', 'pieces' => $all_arms],
                        ['nom' => 'Jambes', 'colonne' => 'id_jambes', 'pieces' => $all_legs],
                    ];

                    function trouverDescriptionPiece($pieces, $id)
                    {
                        foreach ($pieces as $piece) {
                            if ((int)$piece['id'] === (int)$id) {
                                return $piece['description'];
                            }
                        }

                        return 'Pièce inconnue';
                    }
                    ?>

                    <div class="steps">
                        <?php foreach ($etapes as $index => $etape): ?>
                            <div class="number">
                                <div class="name-step">
                                    <span><?= $index + 1 ?></span>
                                    <p><?= htmlspecialchars($etape['nom'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>

                                <p class="description-step">
                                    <?= htmlspecialchars(
                                        trouverDescriptionPiece(
                                            $etape['pieces'],
                                            $robot_existant[$etape['colonne']]
                                        ),
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </p>
                            </div>
                        <?php endforeach; ?>

                        <div class="number">
                            <div class="name-step">
                                <span>6</span>
                                <div class="fonctionnalites">
                                    <h3>Fonctionnalités</h3>

                                    <?php if (!empty($details_fonctionnalites)): ?>

                                        <ul>
                                            <?php foreach ($details_fonctionnalites as $fonctionnalite): ?>
                                                <li>
                                                    <?= htmlspecialchars($fonctionnalite['nom'], ENT_QUOTES, 'UTF-8') ?>
                                                    —
                                                    <?= number_format((float)$fonctionnalite['prix_applique'], 2, ',', ' ') ?> €
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>

                                    <?php else: ?>
                                        <p>Aucune fonctionnalité sélectionnée.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="number">
                                <div class="name-step">
                                    <span>7</span>
                                    <p>Identité</p>
                                </div>
                                <p class="description-step">
                                    <?= htmlspecialchars($robot_existant['nom'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>

                        <div class="price">
                            <p>
                                Prix final :
                                <?= number_format($prix_total, 2, ',', ' ') ?> €
                            </p>
                        </div>
                </section>
            </div>

            <section class="description">
                <h3>Description de votre robot</h3>
                <p>
                    <?= nl2br(htmlspecialchars(
                        $robot_existant['description'] ?? '',
                        ENT_QUOTES,
                        'UTF-8'
                    )) ?>
                </p>

                <hr>

                <section class="choice">
                    <div class="buttons">
                        <p>Ce design vous convient ?</p>
                        <a href="">Mettre en production</a>
                    </div>
                    <div class="buttons">
                        <p>Quelques finitions à faire ?</p>

                        <a href="<?= htmlspecialchars(
                                        URL . '/?action=creationrobot&robot=' . (int)$robot_existant['id'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>">
                            Revenir à l'étape de création
                        </a>
                    </div>
                </section>
            </section>
        </main>
    </div>

    <footer>
        <div class="background-footer">
            <div class="logo-footer">
                <img src="../img/mascotte-footer.png" alt="">
            </div>
            <div class="mentions-legales">
                <div class="liens-utiles">
                    <h6>Liens utiles</h6>
                    <p>Accueil</p>
                    <p>Mes robots</p>
                    <p>Mentions légales</p>
                </div>
                <div class="support">
                    <h6>Support</h6>
                    <p>Conditions d'utilisation</p>
                    <p>Politique de confidentialité</p>
                </div>
                <div class="suivez-nous">
                    <h6>Suivez-nous</h6>
                    <div class="social">
                        <img class="media" src="../img/insta.png" alt="logo réseaux sociaux">
                        <img class="media" src="../img/fb.png" alt="logo réseaux sociaux">
                        <img class="media" src="../img/twitter.png" alt="logo réseaux sociaux">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../js/burger.js"></script>
</body>

</html>