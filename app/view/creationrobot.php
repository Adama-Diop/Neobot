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
                    <a href="">1. Base</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-bulb"></i>
                    <a href="">2. tête</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">3. Corps</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">4. Bras</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">5. Jambes</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">6. Détails</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-settings"></i>
                    <a href="">7. Identité</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <main class="main-container">
            <form action="" method="post">

                <?php if (!empty($robot_existant)): ?>
                    <input
                        type="hidden"
                        name="robot_id"
                        value="<?= (int)$robot_existant['id'] ?>">
                <?php endif; ?>

                <div class="step 1">
                    <p class="progression">Etape 1 sur 7</p>
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
                    <p class="progression">Etape 2 sur 7</p>
                    <h2>Personnalisez la tête</h2>
                    <h3>Choisissez la forme et les yeux de votre robot</h3>
                    <div class="step-container">
                        <!-- <div class="tabs">
                            <p>Tête</p>
                            <p>Yeux</p>
                        </div> -->

                        <div class="head choice">
                            <?php foreach ($all_heads as $head): ?>
                                <label for="">
                                    <input
                                        type="radio"
                                        name="head"
                                        value="<?= $head['id'] ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_tete'] === (int)$head['id']
                                            ? 'checked' : '' ?>>
                                    <img src=<?= $head["img"] ?> alt="photos pièces détachées tête 1" class="corpse-img">
                                    <p><?= $head["description"] ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <!-- METTRE LES OPTIONS YEUX -->

                        <h4>Couleur de la tête</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                </div>

                <div class="step 3">
                    <p class="progression">Etape 3 sur 7</p>
                    <h2>Personnalisez le corps</h2>
                    <h3>Choisissez la forme du torse, les détails et les éléments techniques.</h3>
                    <div class="step-container">
                        <!-- <div class="tabs">
                            <p>Forme</p>
                            <p>Détails</p>
                            <p>Energie</p>
                        </div> -->

                        <div class="body choice">
                            <?php foreach ($all_bodies as $body): ?>
                                <label for="">
                                    <input
                                        type="radio"
                                        name="body"
                                        value="<?= $body['id'] ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_corps'] === (int)$body['id']
                                            ? 'checked' : '' ?>>
                                    <img src=<?= $body["img"] ?> alt="photos pièces détachées torse" class="corpse-img">
                                    <p><?= $body["description"] ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <!-- METTRE LES OPTIONS DETAILS
                        METTRE LES OPTIONS ENERGIE -->


                        <h4>Couleur de la tête</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                </div>

                <div class="step 4">
                    <p class="progression">Etape 4 sur 7</p>
                    <h2>Personnalisez les bras</h2>
                    <h3>Choisissez le style et les outils pour les bras de votre robot</h3>
                    <div class="step-container">
                        <!-- <div class="tabs">
                            <p>Bras</p>
                            <p>Outils</p>
                        </div> -->

                        <div class="arm choice">
                            <?php foreach ($all_arms as $arm): ?>
                                <label for="">
                                    <input
                                        type="radio"
                                        name="arm"
                                        value="<?= $arm['id'] ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_bras'] === (int)$arm['id']
                                            ? 'checked' : '' ?>>
                                    <img src=<?= $arm["img"] ?> alt="photos pièces détachées bras" class="corpse-img">
                                    <p><?= $arm["description"] ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <!-- METTRE LES OPTIONS D'OUTILLAGES -->

                        <h4>Couleur des bras</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                </div>

                <div class="step 5">
                    <p class="progression">Etape 5 sur 7</p>
                    <h2>Personnalisez les jambes</h2>
                    <h3>Choisissez le style de jambes adapté votre robot</h3>
                    <div class="step-container">

                        <div class="leg choice">
                            <?php foreach ($all_legs as $leg): ?>
                                <label for="">
                                    <input
                                        type="radio"
                                        name="leg"
                                        value="<?= $leg['id'] ?>"
                                        <?= isset($robot_existant) && $robot_existant
                                            && (int)$robot_existant['id_jambes'] === (int)$leg['id']
                                            ? 'checked' : '' ?>>
                                    <img src=<?= $leg["img"] ?> alt="photos pièces détachées jambes" class="corpse-img">
                                    <p><?= $leg["description"] ?></p>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <h4>Couleur des jambes</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                </div>

                <div class="step 6">
                    <p class="progression">Etape 6 sur 7</p>
                    <h2>Ajoutez des détails</h2>
                    <h3>Personnalisez les capacités et fonctionnalités de votre robot.</h3>
                    <div class="step-container">
                        <div class="tabs">
                            <p>Audio</p>
                            <p>Vision</p>
                            <p>Capteurs</p>
                        </div>

                        <!-- METTRE DETAILS AUDIO
                        METTRE DETAILS VISON -->

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
                    <p class="progression">Etape 7 sur 7</p>
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
    <!-- Footer commun -->
    <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
    <!-- FIn de footer -->
</body>

</html>