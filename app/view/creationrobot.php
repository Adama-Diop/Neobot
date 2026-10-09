<title>@@Création de votre robot</title>

<!-- Head générique -->
<?= require_once PATH_ROOT . "/view/templates/head.php" ?>
<!-- FIn de head -->

<link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/creationrobot.css">

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

                <div class="step 1">
                    <p class="progression">Etape 1 sur 7</p>
                    <h2>Choisissez votre base</h2>
                    <h3>Sélectionnez le type de base qui définira la silhouette et les capacités de votre robot</h3>
                    <div class="cards-container">

                        <?php foreach ($basesRobots as $baseRobot): ?>
                            <div class="card">
                                <label for="">
                                    <input type="radio" name="base" value="<?= $baseRobot["id"] ?>">
                                    <img src=<?= $baseRobot["img"] ?> alt="robot">
                                </label>
                                <div class="base-robot">
                                    <p class="nature"><?= $baseRobot["nom"] ?></p>
                                    <p class="descriptif"><?= $baseRobot["desc"] ?></p>
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
                            <?php foreach ($robotHeads as $robotHead): ?>
                                <label for="">
                                    <input type="radio" name="head" value="<?= $robotHead["id"] ?>">
                                    <img src=<?= $robotHead["img"] ?> alt="photos pièces détachées tête 1" class="corpse-img">
                                    <p><?= $robotHead["desc"] ?></p>
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

                        <div class="torso choice">
                            <?php foreach ($robotTorsos as $robotTorso): ?>
                                <label for="">
                                    <input type="radio" name="torso" value="<?= $robotTorso["id"] ?>">
                                    <img src=<?= $robotTorso["img"] ?> alt="photos pièces détachées torse" class="corpse-img">
                                    <p><?= $robotTorso["desc"] ?></p>
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
                            <?php foreach ($robotArms as $robotArm): ?>
                                <label for="">
                                    <input type="radio" name="arm" value="<?= $robotArm["id"] ?>">
                                    <img src=<?= $robotArm["img"] ?> alt="photos pièces détachées bras" class="corpse-img">
                                    <p><?= $robotArm["desc"] ?></p>
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
                            <?php foreach ($robotLegs as $robotLeg): ?>
                                <label for="">
                                    <input type="radio" name="leg" value="<?= $robotLeg["id"] ?>">
                                    <img src=<?= $robotLeg["img"] ?> alt="photos pièces détachées jambes" class="corpse-img">
                                    <p><?= $robotLeg["desc"] ?></p>
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
                            <label for="">
                                <i class="fi fi-sr-distribute-spacing-vertical"></i>
                                <p>Capteur de distance</p>
                                <input type="checkbox" name="distance" id="">
                            </label>
                            <label for="">
                                <i class="fi fi-ss-temperature-low"></i>
                                <p>Capteur de température</p>
                                <input type="checkbox" name="température" id="">
                            </label>
                            <label for="">
                                <i class="fi fi-ss-sensor-smoke"></i>
                                <p>Capteur d'humidité</p>
                                <input type="checkbox" name="humidité" id="">
                            </label>
                            <label for="">
                                <img class="capacity" src="" alt="photo capacité 1">
                                <p>Capteur infrarouges</p>
                                <input type="checkbox" name="infrarouges" id="">
                            </label>
                            <label for="">
                                <img class="capacity" src="" alt="photo capacité 1">
                                <p>Capteur de luminosité</p>
                                <input type="checkbox" name="luminosité" id="">
                            </label>
                            <label for="">
                                <img class="capacity" src="" alt="photo capacité 1">
                                <p>Lidar</p>
                                <input type="checkbox" name="lidar" id="">
                            </label>
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
                            <input type="text" name="nom" id="nom">
                        </div>

                        <div class="robot-description">
                            <label for="">description</label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                </div>

                <button name="end">Terminer et valider le robot</button>
            </form>
        </main>
    </div>
    <!-- Footer commun -->
    <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
    <!-- FIn de footer -->
</body>

</html>