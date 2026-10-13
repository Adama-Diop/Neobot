<title>Accueil</title>

<?= require_once PATH_ROOT . "/view/templates/head.php" ?>

<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/4.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>


<link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/accueil.css">
</head>

<body>
    <header class="fixed-navbar">
        <a href="" class="burger"><i class="fi fi-br-menu-burger"></i></a>
        <a href="" class="close"><i class="fi fi-br-cross"></i></a>
        <div class="fixed-navbar-show-hide">
            <div class="logo">
                <img src="./view/img/logoNeo.png" alt="logo">
            </div>
            <div class="buttons">
                <a href="">Se connecter</a>
                <a href="">S'inscrire</a>
                <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
                    <a href="<?= htmlspecialchars(URL . '/?action=admin', ENT_QUOTES, 'UTF-8') ?>">
                        Administration
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="intro-container">
            <div class="text-intro">
                <h1>Créez votre <span>robot</span> de A à Z</h1>
                <p>Concevez, personnalisez et déployez votre robot avec une plateforme intuitive pensée pour les
                    créateurs, ingénieurs et rêveurs.</p>
                <a href="<?= URL ?>/?action=creationrobot">Commencez à créer</a>
            </div>
            <div class="image-robot-container">
                <img src="./view/img/robot-creation.png" alt="Image d'un robot">
            </div>
        </section>

        <section class="steps-container">
            <h3>De l'idée à la création en <span>3 étapes</span></h3>
            <div class="steps">
                <div class="step">
                    <div class="step-image">
                        <span>01</span>
                        <i class="fi fi-sr-paintbrush-pencil" style="font-size: 30px; color: blueviolet;"></i>
                    </div>
                    <div class="description-step">
                        <h4>Concevez</h4>
                        <p>Choisissez un châssis et ajoutez les composants dont vous avez besoin.</p>
                    </div>
                </div>
                <img class="fleches" src="./view/img/arrow.png" alt="icône flèche">
                <div class="step">
                    <div class="step-image">
                        <span>02</span>
                        <i class="fi fi-sr-customize" style="font-size: 30px; color: blueviolet;"></i>
                    </div>
                    <div class="description-step">
                        <h4>Personnalisez</h4>
                        <p>Adapter chaque détail : forme, couleur, capteurs, moteurs et plus encore</p>
                    </div>
                </div>
                <img class="fleches" src="./view/img/arrow.png" alt="icône flèche">
                <div class="step">
                    <div class="step-image">
                        <span>03</span>
                        <i class="fi fi-ss-paper-plane" style="font-size: 30px; color: blueviolet; "></i>
                    </div>
                    <div class="description-step">
                        <h4>Déployez</h4>
                        <p>Donner vie à votre robot dans le monde réel.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="community-container">
            <h3>Communauté</h3>
            <h4>Des créations qui inspirent</h4>
            <p>Rejoignez une communauté mondiale de céateurs et partagez vos robots</p>
            <a href="">Rejoindre la communauté</a>
        </section>

        <div class="cta">
            <div class="cta-content">
                <h4>Prêt à donner vie à vos idées ?</h4>
                <img src="./view/img/mascotte-volant.png" alt="logo robot">
                <p>Rejoignez NeoBot et commencez à créer dès aujourd’hui.</p>
            </div>
            <a href="<?= URL ?>/?action=creationrobot">Commencez à créer</a>
        </div>
    </main>

    <!-- Footer commun -->
    <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>
    <!-- FIn de footer -->
</body>

</html>