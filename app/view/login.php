<?= require_once PATH_ROOT . "/view/templates/header.php" ?>
<link rel="stylesheet" href="<?= URL ?>/view/css/connexion.css">

</head>

<body>
    <?= require_once PATH_ROOT . "/view/templates/navbar.php" ?>




    <div class="container">
        <main class="main-container">

            <h1>Se connecter</h1>
            <p> <?= $error_msg ?> </p>

            <form method="POST" action="">
                <img src="<?= URL ?>/view/img/logoNeo.png" alt="" width="50px" height="60px">
                <h2>NEOBOT</h2>

                <label>Pseudo</label>
                <input class="input" type="text" name="pseudo" value="<?= $username ?>"><br><br>

                <label>Mot de passe</label>
                <input class="input" type="mdp" name="mdp"><br><br>

                <input id="submit" type="submit" name="update" value="Se connecter">
                <a href="<?= URL ?>/?action=signin">Créer un compte</a>
            </form>

            <?= require_once PATH_ROOT . "/view/templates/footer.php" ?>