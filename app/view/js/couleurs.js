
// Objet avec les principales informations et avec 3 propriétés chacunes

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

// Récupère la liste des noms de mon objet
Object.keys(configurationsCouleurs).forEach(function (categorie) {
    // Je range la categorie en cours dans la variable configuration
    const configuration = configurationsCouleurs[categorie];

    // Je sélectionne tous les éléments colorpicker
    document.querySelectorAll(
        '.color-picker[data-category="' + categorie + '"] .color-option'
    ).forEach(function (button) {
        // écouteur d'évènement qui change la valeur de l'attribut data selon ce que l'utilisateur a choisi
        button.addEventListener('click', function () {
            const couleur = this.dataset.color;

            // Mettre à jour les images de cette catégorie grâce au sélécteur
            document.querySelectorAll(configuration.selecteur)
                .forEach(function (radio) {
                    // je récupère image et réf s'il y a
                    const label = radio.closest('label');
                    const image = label ? label.querySelector('img') : null;
                    const ref = radio.dataset.ref;

                    // si j'ai image + ref -> je change le chemin du dossier
                    if (image && ref) {
                        image.src = configuration.dossier
                            + ref + '-' + couleur + '.png';
                    }
                });

            // Enregistrer la couleur dans le champ caché du formulaire grâce à l'id
            const champCouleur = document.getElementById(
                configuration.champ
            );
            // si champ trouvé, remplace la valeur par la couleur sélectionné par l'utilisateur
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

// Récupère la couleur choisie pour chaque catégorie et retrouve le bouton correspondant
function restaurerCouleurs() {
    Object.keys(configurationsCouleurs).forEach(function (categorie) {
        // récupère les informations associées à la catégorie actuelle
        const configuration = configurationsCouleurs[categorie];
        // contient l'identifiant du champ HTML dans lequel se trouve la couleur
        const champCouleur = document.getElementById(configuration.champ);
        const couleur = champCouleur ? champCouleur.value : 'bleu';

        // retrouve le bouton correspondant
        const bouton = document.querySelector(
            // catégorie de couleurs concernée.
            '.color-picker[data-category="' + categorie + '"] ' +
            // couleur à sélectionner
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