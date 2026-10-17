<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="<?php echo URL . "/view/"  ?>css/admin.css">
    <title>Document</title>
</head>

<body>
    <div>
        <i class="fi fi-rr-arrow-small-left"></i>
        <a href="<?= URL ?>/?action=admin">Retour au tableau de bord</a>
    </div>

    <div class="admin-container">
        <h1>Gestion des clients</h1>

        <?php if (empty($clients)): ?>
            <p>Aucun client inscrit pour le moment.</p>
        <?php else: ?>

            <div class="clients-table">
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
            </div>
        <?php endif; ?>
    </div>
</body>

</html>