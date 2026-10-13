<header class="fixed-navbar">
    <a href="" class="burger"><i class="fi fi-br-menu-burger"></i></a>
    <a href="" class="close"><i class="fi fi-br-cross"></i></a>
    <div class="fixed-navbar-show-hide">
        <div class="logo">
            <img src="<?= URL . "/view" ?>/img/logoNeo.png" alt=" logo">
        </div>
        <nav class="navbar-links">
            <div class="links">
                <div class="link">
                    <i class="fi fi-bs-home"></i>
                    <a href="">Accueil</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-user-robot"></i>
                    <a href="">Mes robots</a>
                </div>
                <div class="link">
                    <i class="fi fi-rr-website-design"></i>
                    <a href="">Créer un robot</a>
                </div>
            </div>
            <div class="connexion">
                <img src="<?= URL . "/view" ?>/img/avatar.png" alt="photo de profil" width="70px" height="70px">
                <a href="<?= URL ?>/?action=logout">Se déconnecter</a>
            </div>
        </nav>
    </div>
</header>
<div class="container">
    <main class="main-container">