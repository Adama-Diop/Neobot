<title>@@Création de votre robot</title>

<!-- Head générique -->
<?= require_once PATH_ROOT . "/view/templates/head.php" ?>
<!-- FIn de head -->

<link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/creationrobot.css">
<link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/navbar.css">

<!-- Head Spécifique -->
<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>

<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
<!-- FIn de spécifique -->

</head>

<body>
    <header class="fixed-navbar">
        <a href="" class="burger"><i class="fi fi-br-menu-burger"></i></a>
        <a href="" class="close"><i class="fi fi-br-cross"></i></a>
        <div class="fixed-navbar-show-hide">
            <div class="logo">
                <img src="./view/img/logoNeo.png" alt="logo">
            </div>
            <nav class="navbar-links">
                <div class="link">
                    <i class="fi fi-bs-home"></i>
                    <a href="#base">1. Base</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-bulb"></i>
                    <a href="#head">2. tête</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="#body">3. Corps</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="#arm">4. Bras</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="#leg">5. Jambes</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="#details">6. Détails</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="#identity">7. Identité</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <main class="main-container">
            <form action="" method="post">

                <input type="hidden" name="couleur_tete" id="couleur_tete"
                    value="<?= htmlspecialchars($robot_existant['couleur_tete'] ?? 'bleu', ENT_QUOTES, 'UTF-8') ?>">

                <input type="hidden" name="couleur_corps" id="couleur_corps"
                    value="<?= htmlspecialchars($robot_existant['couleur_corps'] ?? 'bleu', ENT_QUOTES, 'UTF-8') ?>">

                <input type="hidden" name="couleur_bras" id="couleur_bras"
                    value="<?= htmlspecialchars($robot_existant['couleur_bras'] ?? 'bleu', ENT_QUOTES, 'UTF-8') ?>">

                <input type="hidden" name="couleur_jambes" id="couleur_jambes"
                    value="<?= htmlspecialchars($robot_existant['couleur_jambes'] ?? 'bleu', ENT_QUOTES, 'UTF-8') ?>">

                <?php if (!empty($robot_existant)): ?>
                    <input
                        type="hidden"
                        name="robot_id"
                        value="<?= (int)$robot_existant['id'] ?>">
                <?php endif; ?>

                <div class="step 1">
                    <p class="progression" id="base">Etape 1 sur 7</p>
                    <h2>Choisissez votre base</h2>
                    <h3>Sélectionnez le type de base qui définira la silhouette et les capacités de votre robot</h3>
                    <div class="cards-container">

                        <?php foreach ($all_bases as $base): ?>
                            <div class="card">
                                <label for="">
                                    <input
                                        type="radio"
                                        name="base"
                                        value="<?= $base['id'] ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_base'] === (int)$base['id']
                                            ? 'checked' : '' ?>>
                                    <img src=<?= $base["img"] ?> alt="robot">
                                </label>
                                <div class="base-robot">
                                    <p class="nature"><?= $base["locomotion"] ?></p>
                                    <p class="descriptif"><?= $base["description"] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="instructions">
                        <p>Chaque base possède des caractéristiques uniques qui influenceront les mouvements et les
                            accessoires disponibles.</p>
                    </div>
                </div>

                <div class="step 2">
                    <p class="progression" id="head">Etape 2 sur 7</p>
                    <h2>Personnalisez la tête</h2>
                    <h3>Choisissez la forme et les yeux de votre robot</h3>
                    <div class="step-container">

                        <h4>Couleur de la tête</h4>
                        <div class="color-picker" data-category="head">

                            <button type="button" class="color-option selected"
                                data-color="bleu" style="background-color: #2563EB"
                                aria-label="Bleu" title="Bleu"></button>

                            <button type="button" class="color-option"
                                data-color="jaune" style="background-color: #FACC15"
                                aria-label="Jaune" title="Jaune"></button>

                            <button type="button" class="color-option"
                                data-color="rose" style="background-color: #EC4899"
                                aria-label="Rose" title="Rose"></button>

                            <button type="button" class="color-option"
                                data-color="rouge" style="background-color: #F54927"
                                aria-label="Rouge" title="Rouge"></button>

                            <button type="button" class="color-option"
                                data-color="vert" style="background-color: #16A34A"
                                aria-label="Vert" title="Vert"></button>

                            <button type="button" class="color-option"
                                data-color="violet" style="background-color: #7B2CBF"
                                aria-label="Violet" title="Violet"></button>
                        </div>

                        <div class="head choice">
                            <?php foreach ($all_heads as $head): ?>
                                <label>
                                    <input
                                        type="radio"
                                        name="head"
                                        value="<?= (int)$head['id'] ?>"
                                        data-ref="<?= htmlspecialchars($head['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_tete'] === (int)$head['id']
                                            ? 'checked' : '' ?>>

                                    <img
                                        src="<?= htmlspecialchars($head['img'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($head['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="corpse-img">

                                    <p><?= htmlspecialchars($head['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="step 3">
                    <p class="progression" id="body">Etape 3 sur 7</p>
                    <h2>Personnalisez le corps</h2>
                    <h3>Choisissez la forme du torse, les détails et les éléments techniques.</h3>
                    <div class="step-container">

                        <h4>Couleur du corps</h4>
                        <div class="color-picker" data-category="body">

                            <button type="button" class="color-option selected"
                                data-color="bleu" style="background-color: #2563EB"
                                aria-label="Bleu" title="Bleu"></button>

                            <button type="button" class="color-option"
                                data-color="jaune" style="background-color: #FACC15"
                                aria-label="Jaune" title="Jaune"></button>

                            <button type="button" class="color-option"
                                data-color="rose" style="background-color: #EC4899"
                                aria-label="Rose" title="Rose"></button>

                            <button type="button" class="color-option"
                                data-color="rouge" style="background-color: #F54927"
                                aria-label="Rouge" title="Rouge"></button>

                            <button type="button" class="color-option"
                                data-color="vert" style="background-color: #16A34A"
                                aria-label="Vert" title="Vert"></button>

                            <button type="button" class="color-option"
                                data-color="violet" style="background-color: #7B2CBF"
                                aria-label="Violet" title="Violet"></button>
                        </div>

                        <div class="body choice">
                            <?php foreach ($all_bodies as $body): ?>
                                <label>
                                    <input
                                        type="radio"
                                        name="body"
                                        value="<?= (int)$body['id'] ?>"
                                        data-ref="<?= htmlspecialchars($body['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_corps'] === (int)$body['id']
                                            ? 'checked' : '' ?>>

                                    <img
                                        src="<?= htmlspecialchars($body['img'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($body['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="corpse-img">

                                    <p><?= htmlspecialchars($body['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="step 4">
                    <p class="progression" id="arm">Etape 4 sur 7</p>
                    <h2>Personnalisez les bras</h2>
                    <h3>Choisissez le style et les outils pour les bras de votre robot</h3>
                    <div class="step-container">

                        <h4>Couleur des bras</h4>
                        <div class="color-picker" data-category="arm">

                            <button type="button" class="color-option selected"
                                data-color="bleu" style="background-color: #2563EB"
                                aria-label="Bleu" title="Bleu"></button>

                            <button type="button" class="color-option"
                                data-color="jaune" style="background-color: #FACC15"
                                aria-label="Jaune" title="Jaune"></button>

                            <button type="button" class="color-option"
                                data-color="rose" style="background-color: #EC4899"
                                aria-label="Rose" title="Rose"></button>

                            <button type="button" class="color-option"
                                data-color="rouge" style="background-color: #F54927"
                                aria-label="Rouge" title="Rouge"></button>

                            <button type="button" class="color-option"
                                data-color="vert" style="background-color: #16A34A"
                                aria-label="Vert" title="Vert"></button>

                            <button type="button" class="color-option"
                                data-color="violet" style="background-color: #7B2CBF"
                                aria-label="Violet" title="Violet"></button>
                        </div>

                        <div class="arm choice">
                            <?php foreach ($all_arms as $arm): ?>
                                <label>
                                    <input
                                        type="radio"
                                        name="arm"
                                        value="<?= (int)$arm['id'] ?>"
                                        data-ref="<?= htmlspecialchars($arm['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_bras'] === (int)$arm['id']
                                            ? 'checked' : '' ?>>

                                    <img
                                        src="<?= htmlspecialchars($arm['img'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($arm['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="corpse-img">

                                    <p><?= htmlspecialchars($arm['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="step 5">
                    <p class="progression" id="leg">Etape 5 sur 7</p>
                    <h2>Personnalisez les jambes</h2>
                    <h3>Choisissez le style de jambes adapté votre robot</h3>
                    <div class="step-container">

                        <h4>Couleur des jambes</h4>
                        <div class="leg-colors color-picker" data-category="leg">

                            <button type="button" class="color-option selected"
                                data-color="bleu" style="background-color: #2563EB"
                                aria-label="Bleu" title="Bleu"></button>

                            <button type="button" class="color-option"
                                data-color="jaune" style="background-color: #FACC15"
                                aria-label="Jaune" title="Jaune"></button>

                            <button type="button" class="color-option"
                                data-color="rose" style="background-color: #EC4899"
                                aria-label="Rose" title="Rose"></button>

                            <button type="button" class="color-option"
                                data-color="rouge" style="background-color: #F54927"
                                aria-label="Rouge" title="Rouge"></button>

                            <button type="button" class="color-option"
                                data-color="vert" style="background-color: #16A34A"
                                aria-label="Vert" title="Vert"></button>

                            <button type="button" class="color-option"
                                data-color="violet" style="background-color: #7B2CBF"
                                aria-label="Violet" title="Violet"></button>
                        </div>

                        <div class="leg choice">
                            <?php foreach ($all_legs as $leg): ?>
                                <label>
                                    <input
                                        type="radio"
                                        name="leg"
                                        value="<?= (int)$leg['id'] ?>"
                                        data-ref="<?= htmlspecialchars($leg['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_jambes'] === (int)$leg['id']
                                            ? 'checked' : '' ?>>

                                    <img
                                        src="<?= htmlspecialchars($leg['img'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($leg['ref'], ENT_QUOTES, 'UTF-8') ?>"
                                        class="corpse-img">

                                    <p><?= htmlspecialchars($leg['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="step 6">
                    <p class="progression" id="details">Etape 6 sur 7</p>
                    <h2>Ajoutez des détails</h2>
                    <h3>Personnalisez les capacités et fonctionnalités de votre robot.</h3>
                    <div class="step-container">

                        <div class="details choice">

                            <?php foreach ($all_fonctionnalites as $fonctionnalite): ?>

                                <label>
                                    <p>
                                        <?= htmlspecialchars(
                                            $fonctionnalite['nom'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>
                                    </p>

                                    <p>
                                        <?= number_format(
                                            (float)$fonctionnalite['prix'],
                                            2,
                                            ',',
                                            ' '
                                        ) ?> €
                                    </p>

                                    <input
                                        type="checkbox"
                                        name="fonctionnalites[]"
                                        value="<?= (int)$fonctionnalite['id'] ?>"
                                        <?= in_array(
                                            (int)$fonctionnalite['id'],
                                            $fonctionnalites_selectionnees ?? [],
                                            false
                                        ) ? 'checked' : '' ?>>
                                </label>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <div class="step 7">
                    <p class="progression" id="identity">Etape 7 sur 7</p>
                    <h2>Donnez un nom à votre robot</h2>
                    <h3>C'est la dernière étape ! Donnez-lui un nom et une description.</h3>

                    <div class="step-seven-container">

                        <div class="robot-name">
                            <label for="">Nom du robot</label>
                            <input
                                type="text"
                                name="nom"
                                id="nom"
                                value="<?= htmlspecialchars($robot_existant['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        </div>

                        <div class="robot-description">
                            <label for="">description</label>
                            <textarea name="description"><?= htmlspecialchars($robot_existan['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" name="end">
                    <?= !empty($robot_existant)
                        ? 'Enregistrer les modifications'
                        : 'Terminer et valider le robot' ?>
                </button>
            </form>
        </main>
    </div>
    <script src="view/js/couleurs.js"></script>
    <!-- Footer commun -->
    <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
    <!-- FIn de footer -->
</body>

</html>