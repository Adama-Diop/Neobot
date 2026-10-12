<div class="admin-container">
    <h1>Administration NeoBot</h1>

    <p>Bienvenue dans ton espace administrateur.</p>

    <nav class="admin-menu">
        <ul>
            <li>
                <a href="<?= htmlspecialchars(URL . '/?action=adminclients', ENT_QUOTES, 'UTF-8') ?>">
                    Gestion des clients
                </a>
            </li>
            <li>
                <a href="<?= htmlspecialchars(URL) ?>/?action=adminrobots">
                    Gestion des robots
                </a>
            </li>
        </ul>
    </nav>
</div>