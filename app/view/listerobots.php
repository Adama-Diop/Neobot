    <!-- Head générique -->
    <?= require_once PATH_ROOT . "/view/templates/head.php" ?>
    <!-- FIn de head -->


    <!-- Head Spécifique -->
    <title>@@ liste NeoBot</title>
    <link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/listerobots.css">

    <!-- FIn de spécifique -->

    </head>

    <body>
        <!-- Nav BAR Logged in -->
        <?= require_once PATH_ROOT . "/view/templates/header.php" ?>
        <!-- FIn de NAv BAR -->


        <section class="robots-container">
            <div class="mes-robots">
                <div class="intro">
                    <h2>Mes Robots</h2>
                    <div class="sub-title">
                        <p>Retrouvez ici tous les robots que vous avez créés.</p>
                        <p>Modifiez-les, supprimez-les ou mettez-les en production.</p>
                    </div>
                </div>
                <div class="cta-create-robot">
                    <a href="http://localhost/neobot/achatrobot.php">➕ Créer un robot</a>
                </div>
            </div>

            <div class="etat-robots">
                <p class="etat b">Brouillon</p>
                <p class="etat p">En production</p>
                <p class="etat f">Finalisée</p>
            </div>
            <div class="liste-robots">

                <!-- Debut de loop for -->
                <?php
                foreach ($robots as $robot) : ?>
                    <div class="card">
                        <h3><?= $robot['nom'] ?></h3>
                        <img src="./view/img/rendu-robot-final2.png" alt="robot">
                        <em><?= $robot['date_creation'] ?></em>
                        <div class="actions">
                            <div class="action-button">
                                <span>🖋️</span>
                                <a href="#">Modifier</a>
                            </div>
                            <div class="action-button">
                                <span>🗑️</span>
                                <a href="#">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="../img/rendu-robot-final2.png" alt="robot">
                    <p>...</p>
                    <div class="actions">
                        <div class="action-button">
                            <span>🖋️</span>
                            <a href="#">Modifier</a>
                        </div>
                        <div class="action-button">
                            <span>🗑️</span>
                            <a href="#">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer commun -->
        <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
        <!-- FIn de footer -->

        <!-- ICI mes scripts spécifiques a la vue -->


        <!-- fin de scripts -->
    </body>

    </html>