<div class="admin-container">
    <h1>Gestion des clients</h1>

    <p>
        <a href="<?= htmlspecialchars(URL . '/?action=admin', ENT_QUOTES, 'UTF-8') ?>">
            ← Retour au tableau de bord
        </a>
    </p>

    <?php if (empty($clients)): ?>
        <p>Aucun client inscrit pour le moment.</p>
    <?php else: ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>E-mail</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= (int)$client['id'] ?></td>

                        <td>
                            <?= htmlspecialchars(
                                $client['pseudo'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $client['email'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $client['date_inscription'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            <a href="<?= htmlspecialchars(
                                            URL . '/?action=adminrobots&client=' . (int)$client['id'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ) ?>">
                                Voir ses robots
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>