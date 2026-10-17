    <!-- Head générique -->
    <?php require_once PATH_ROOT . "/view/templates/head.php" ?>
    <!-- FIn de head -->

    <link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/robotfinal.css">
    <link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/navbar.css">

    </head>

    <body>
        <!-- Nav BAR Logged in -->
        <?php require_once PATH_ROOT . "/view/templates/header.php" ?>
        <!-- FIn de NAv BAR -->
        <h2>
            Voici la version finale de
            <span class="robot-name">
                <?= htmlspecialchars($robot_existant['nom'], ENT_QUOTES, 'UTF-8') ?>
            </span>
        </h2>
        <div class="debrief-container">
            <div class="robotanddesc-container">
                <?php
                function trouverPieceParIdFinal($pieces, $id)
                {
                    foreach ($pieces as $piece) {
                        if ((int)$piece['id'] === (int)$id) {
                            return $piece;
                        }
                    }

                    return null;
                }

                $teteFinale = trouverPieceParIdFinal($all_heads, $robot_existant['id_tete']);
                $corpsFinal = trouverPieceParIdFinal($all_bodies, $robot_existant['id_corps']);
                $brasFinal = trouverPieceParIdFinal($all_arms, $robot_existant['id_bras']);
                $jambesFinales = trouverPieceParIdFinal($all_legs, $robot_existant['id_jambes']);

                $couleurTete = $robot_existant['couleur_tete'] ?? 'bleu';
                $couleurCorps = $robot_existant['couleur_corps'] ?? 'bleu';
                $couleurBras = $robot_existant['couleur_bras'] ?? 'bleu';
                $couleurJambes = $robot_existant['couleur_jambes'] ?? 'bleu';

                $cheminTete = $teteFinale
                    ? 'view/img/tete/' . $teteFinale['ref'] . '-' . $couleurTete . '.png'
                    : '';

                $cheminCorps = $corpsFinal
                    ? 'view/img/corps/' . $corpsFinal['ref'] . '-' . $couleurCorps . '.png'
                    : '';

                $cheminBras = $brasFinal
                    ? 'view/img/bras/' . $brasFinal['ref'] . '-' . $couleurBras . '.png'
                    : '';

                $cheminJambes = $jambesFinales
                    ? 'view/img/jambes/' . $jambesFinales['ref'] . '-' . $couleurJambes . '.png'
                    : '';
                ?>

                <div class="robot-assemble">
                    <?php if ($cheminJambes !== ''): ?>
                        <img class="piece-robot jambes"
                            src="<?= htmlspecialchars(URL . '/' . $cheminJambes, ENT_QUOTES, 'UTF-8') ?>"
                            alt="Jambes du robot">
                    <?php endif; ?>

                    <?php if ($cheminBras !== ''): ?>
                        <img class="piece-robot bras bras-gauche"
                            src="<?= htmlspecialchars(URL . '/' . $cheminBras, ENT_QUOTES, 'UTF-8') ?>"
                            alt="Bras gauche du robot">

                        <img class="piece-robot bras bras-droit"
                            src="<?= htmlspecialchars(URL . '/' . $cheminBras, ENT_QUOTES, 'UTF-8') ?>"
                            alt="Bras droit du robot">
                    <?php endif; ?>

                    <?php if ($cheminCorps !== ''): ?>
                        <img class="piece-robot corps"
                            src="<?= htmlspecialchars(URL . '/' . $cheminCorps, ENT_QUOTES, 'UTF-8') ?>"
                            alt="Corps du robot">
                    <?php endif; ?>

                    <?php if ($cheminTete !== ''): ?>
                        <img class="piece-robot tete"
                            src="<?= htmlspecialchars(URL . '/' . $cheminTete, ENT_QUOTES, 'UTF-8') ?>"
                            alt="Tête du robot">
                    <?php endif; ?>
                </div>
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
                                    <p>Fonctionnalités</p>

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
                </section>
            </div>
            <div class="price">
                <p>
                    Prix final :
                    <?= number_format($prix_total, 2, ',', ' ') ?> €
                </p>
            </div>
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
        <!-- Footer commun -->
        <?php require_once PATH_ROOT . "/view/templates/footer.php" ?>
        <!-- FIn de footer -->
    </body>

    </html>