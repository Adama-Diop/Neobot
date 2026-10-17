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
        <a href="<?= URL ?>/?action=adminclients">Retour aux clients</a>
    </div>

    <div class="admin-container">
        <h1>Robots du client #<?= (int)$id_client ?></h1>

        <?php if (empty($robots)): ?>
            <p>Ce client n'a créé aucun robot.</p>
        <?php else: ?>

            <div class="robots-table">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom du robot</th>
                            <th>Client</th>
                            <th>Base</th>
                            <th>Tête</th>
                            <th>Corps</th>
                            <th>Bras</th>
                            <th>Jambes</th>
                            <th>Date de création</th>
                            <th>Prix des pièces</th>
                            <th>Prix des fonctionnalités</th>
                            <th>Prix total</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($robots as $robot): ?>

                            <?php
                            $prix_pieces =
                                (float)($robot['prix_base'] ?? 0)
                                + (float)($robot['prix_tete'] ?? 0)
                                + (float)($robot['prix_corps'] ?? 0)
                                + (float)($robot['prix_bras'] ?? 0)
                                + (float)($robot['prix_jambes'] ?? 0);

                            $prix_fonctionnalites = getPrixFonctionnalitesAdmin((int)$robot['id']);

                            if ($prix_fonctionnalites === false) {
                                $prix_fonctionnalites = 0;
                            }

                            $prix_total = $prix_pieces + $prix_fonctionnalites;
                            ?>

                            <tr>
                                <td><?= (int)$robot['id'] ?></td>

                                <td>
                                    <?= htmlspecialchars($robot['nom'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['pseudo'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['nom_base'] ?? 'Inconnue', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['nom_tete'] ?? 'Inconnue', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['nom_corps'] ?? 'Inconnu', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['nom_bras'] ?? 'Inconnu', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['nom_jambes'] ?? 'Inconnues', ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($robot['date_creation'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td><?= number_format($prix_pieces, 2, ',', ' ') ?> €</td>
                                <td><?= number_format($prix_fonctionnalites, 2, ',', ' ') ?> €</td>
                                <td><strong><?= number_format($prix_total, 2, ',', ' ') ?> €</strong></td>

                                <td>
                                    <?= htmlspecialchars($robot['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>
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