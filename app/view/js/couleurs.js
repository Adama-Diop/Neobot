
const configurationsCouleurs = {
    leg: {
        selecteur: '.leg.choice input[name="leg"]',
        dossier: 'view/img/jambes/',
        champ: 'couleur_jambes'
    },
    head: {
        selecteur: '.head.choice input[name="head"]',
        dossier: 'view/img/tete/',
        champ: 'couleur_tete'
    },
    body: {
        selecteur: '.body.choice input[name="body"]',
        dossier: 'view/img/corps/',
        champ: 'couleur_corps'
    },
    arm: {
        selecteur: '.arm.choice input[name="arm"]',
        dossier: 'view/img/bras/',
        champ: 'couleur_bras'
    }
};

Object.keys(configurationsCouleurs).forEach(function (categorie) {
    const configuration = configurationsCouleurs[categorie];

    document.querySelectorAll(
        '.color-picker[data-category="' + categorie + '"] .color-option'
    ).forEach(function (button) {
        button.addEventListener('click', function () {
            const couleur = this.dataset.color;

            // Mettre à jour les images de cette catégorie
            document.querySelectorAll(configuration.selecteur)
                .forEach(function (radio) {
                    const label = radio.closest('label');
                    const image = label ? label.querySelector('img') : null;
                    const ref = radio.dataset.ref;

                    if (image && ref) {
                        image.src = configuration.dossier
                            + ref + '-' + couleur + '.png';
                    }
                });

            // Enregistrer la couleur dans le champ caché du formulaire
            const champCouleur = document.getElementById(
                configuration.champ
            );

            if (champCouleur) {
                champCouleur.value = couleur;
            }

            // Mettre à jour la pastille sélectionnée
            document.querySelectorAll(
                '.color-picker[data-category="' + categorie + '"] .color-option'
            ).forEach(function (option) {
                option.classList.remove('selected');
            });

            this.classList.add('selected');
        });
    });
});

function restaurerCouleurs() {
    Object.keys(configurationsCouleurs).forEach(function (categorie) {
        const configuration = configurationsCouleurs[categorie];
        const champCouleur = document.getElementById(configuration.champ);
        const couleur = champCouleur ? champCouleur.value : 'bleu';

        const bouton = document.querySelector(
            '.color-picker[data-category="' + categorie + '"] ' +
            '.color-option[data-color="' + couleur + '"]'
        );

        if (bouton) {
            bouton.click();
        }
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', restaurerCouleurs);
} else {
    restaurerCouleurs();
}