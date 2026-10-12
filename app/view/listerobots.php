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
                    <a href="<?= URL ?>/?action=creationrobot">➕ Créer un robot</a>
                </div>
            </div>

            <div class="etat-robots">
                <p class="etat b">Brouillon</p>
                <p class="etat p">En production</p>
                <p class="etat f">Finalisée</p>
            </div>
            <div class="liste-robots">

                <!-- Debut de loop for -->
                <?php foreach ($robots as $robot) : ?>
                    <div class="card">
                        <h3><?= htmlspecialchars($robot['nom'], ENT_QUOTES, 'UTF-8') ?></h3>

                        <img src="./view/img/rendu-robot-final2.png" alt="robot">

                        <em><?= htmlspecialchars($robot['date_creation'], ENT_QUOTES, 'UTF-8') ?></em>

                        <div class="actions">

                            <!-- Bouton Modifier -->
                            <div class="action-button">
                                <span>🖋️</span>
                                <a href="<?= URL ?>/?action=creationrobot&robot=<?= $robot['id'] ?>">
                                    Modifier
                                </a>
                            </div>

                            <!-- Bouton Supprimer -->
                            <div class="action-button">
                                <span>🗑️</span>

                                <form
                                    method="post"
                                    action="<?= htmlspecialchars(URL . '/?action=supprimerrobot', ENT_QUOTES, 'UTF-8') ?>"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce robot ? Cette action est définitive.');">
                                    <input
                                        type="hidden"
                                        name="robot_id"
                                        value="<?= (int)$robot['id'] ?>">

                                    <button type="submit" class="btn-supprimer">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Footer commun -->
        <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
        <!-- FIn de footer -->

        <!-- ICI mes scripts spécifiques a la vue -->


        <!-- fin de scripts -->
    </body>

    </html>