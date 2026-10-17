# NeoBot

NeoBot est une application web permettant aux utilisateurs de créer, personnaliser et gérer leurs propres robots.

Chaque utilisateur peut choisir les différentes pièces de son robot, personnaliser ses couleurs, ajouter des fonctionnalités et consulter un récapitulatif de sa création avec son prix total.

## Fonctionnalités

### Gestion des utilisateurs

- L'utilisateur peut se connecter à son compte ou en créer un.
- Chaque robot est associé à son propriétaire grâce à l'ID.
- Un autre utilisateur ne peut pas accéder à un robot qui ne lui appartient pas.

### Création de robots

- L'utilisateur choisis une base.
- Ensuite une tête.
- Un corps.
- Les bras.
- Les jambes.
- Il personnalise les couleurs de chaque partie.
- Sélectionne les fonctionnalités supplémentaires.
- Donne un nom au robot.
- Ajoute une description.

### Gestion des robots (CRUD)

L'utilisateur peut : 
- Enregistrer des robots.
- Consulter la liste des robots créés.
- Modifier un robot existant.
- Supprimer un robot.
- Consulter le récapitulatif de chaque robot.

### Récapitulatif

La page récapitulative permet de visualiser :

- Le robot assemblé.
- Les pièces sélectionnées.
- Les couleurs choisies.
- Les fonctionnalités ajoutées.
- Le nom du robot.
- Sa description.
- Son prix total.

> **Note :** une fonctionnalité de mise en production est envisagée, mais son fonctionnement n'est pas encore confirmé.

## Technologies utilisées

Le projet utilise les technologies suivantes :

**HTML5** pour la structure des pages 
**CSS3** pour la mise en forme et le design 
**JavaScript** pour les interactions et la personnalisation 
**PHP** pour la logique métier et le traitement des formulaires 
**MySQL / MariaDB** pour la gestion de la base de données 
**XAMPP** pour l'environnement de développement local 
**phpMyAdmin** pour l'administration de la base de données 

## Prérequis

Pour installer et exécuter NeoBot en local, vous devez disposer de :

- XAMPP.
- Un serveur Apache.
- Un serveur MySQL ou MariaDB.
- Un navigateur web.
- Les fichiers sources du projet.
- Une sauvegarde SQL de la base de données.

## Installation

### 1. Télécharger le projet

Téléchargez les fichiers du projet NeoBot.

Placez le dossier du projet dans le répertoire `htdocs` de XAMPP.


### 2. Démarrer XAMPP

Ouvrez le panneau de contrôle XAMPP.

Démarrez :

- Apache
- MySQL

### 3. Configurer la base de données

- Ouvrez phpMyAdmin

Créez une base de données nommée :

```sql
CREATE DATABASE neobot;
```

Importez ensuite le fichier SQL du projet.

### 4. Configurer la connexion

Vérifiez les paramètres de connexion dans le fichier :

```text
models/sql_connection.php
```

Les informations de connexion doivent correspondre à votre environnement local.

Vérifiez également la configuration des constantes `URL` et `PATH_ROOT` utilisées dans le projet.

### 5. Lancer le projet

Ouvrez votre navigateur et rendez-vous à l'adresse :

```text
http://localhost/neobot/app/
```

## Base de données

Le projet utilise une base de données relationnelle nommée `neobot`.

### Tables principales

| Table | Description |
|-------|-------------|
| `clients` | Stocke les informations des clients |
| `robots` | Stocke les robots créés |
| `base` | Contient les bases disponibles |
| `tete` | Contient les modèles de têtes |
| `corps` | Contient les modèles de corps |
| `bras` | Contient les modèles de bras |
| `jambes` | Contient les modèles de jambes |
| `fonctionnalites` | Contient les fonctionnalités disponibles |
| `robot_fonctionnalites` | Associe les fonctionnalités aux robots |
| `couleurs` | Contient le référentiel des couleurs |

### Relations

Les principales relations sont les suivantes :

- Un client peut posséder plusieurs robots.
- Un robot appartient à un seul client.
- Un robot possède une base, une tête, un corps, des bras et des jambes.
- Une même pièce peut être utilisée par plusieurs robots.
- Un robot peut posséder plusieurs fonctionnalités.
- Une fonctionnalité peut être utilisée par plusieurs robots.

La relation entre les robots et les fonctionnalités est gérée par la table d'association `robot_fonctionnalites`.

### Gestion des couleurs

Les couleurs des robots sont enregistrées dans la table `robots` grâce aux champs :

```text
couleur_tete
couleur_corps
couleur_bras
couleur_jambes
```

Les couleurs proposées dans le configurateur sont :

- Bleu
- Jaune
- Rose
- Rouge
- Vert
- Violet

La table `couleurs` conserve un référentiel des couleurs.

## Utilisation

### 1. Se connecter

Connectez-vous à votre compte utilisateur pour accéder aux fonctionnalités de création et de gestion des robots.

### 2. Créer un robot

Depuis la page de création :

1. Sélectionnez une base.
2. Choisissez une tête.
3. Choisissez un corps.
4. Choisissez des bras.
5. Choisissez des jambes.
6. Personnalisez les couleurs.
7. Ajoutez les fonctionnalités souhaitées.
8. Donnez un nom à votre robot.
9. Ajoutez une description.
10. Validez votre création.

Le robot est alors enregistré dans la base de données.

### 3. Consulter le récapitulatif

Après la création, l'utilisateur est redirigé vers une page présentant le robot final.

Cette page contient :

- Un aperçu visuel du robot.
- Le détail des pièces sélectionnées.
- Les fonctionnalités ajoutées.
- Le prix total.
- La description du robot.

### 4. Gérer ses robots

Depuis la page **Mes Robots**, l'utilisateur peut :

- Consulter ses robots.
- Accéder au récapitulatif d'un robot.
- Modifier un robot.
- Supprimer un robot.

### 5. Modifier un robot

La modification permet de retrouver les choix précédemment enregistrés.

L'utilisateur peut alors modifier :

- Les pièces du robot.
- Les couleurs.
- Les fonctionnalités.
- Le nom.
- La description.

Les modifications sont ensuite enregistrées dans la base de données.

##  Sécurité

Plusieurs mécanismes de sécurité sont présents dans le projet :

- Vérification de la session utilisateur.
- Vérification du propriétaire d'un robot avant sa modification ou sa consultation.
- Utilisation de requêtes SQL préparées.
- Échappement des données affichées avec `htmlspecialchars()`.
- Validation des champs obligatoires.
- Messages d'erreur en cas de problème lors de la validation du formulaire.


## Améliorations futures

Plusieurs fonctionnalités pourraient être ajoutées :

- Finalisation de la mise en production des robots.
- Amélioration du rendu visuel des robots.
- Ajout de nouvelles pièces.
- Ajout de nouvelles fonctionnalités.
- Amélioration de l'interface utilisateur.
- Renforcement de la sécurité.
- Amélioration de la gestion des erreurs.

## Crédits

Projet réalisé par **Adama DIOP**, avec la supervision des formateurs encadrants, en vue de l'obtention du diplôme **Développeur Web et Web Mobile (DWWM)** au **GRETA CFA Marseille**.
