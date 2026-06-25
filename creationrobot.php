<?php

require_once __DIR__ . '/sql_connection.php';


$list_param = [

    'head' => "",
    'torso' => "",
    'arm' => "",
    'leg' => "",
    'distance' => "",
    'température' => "",
    'humidité' => "",
    'infrarouges' => "",
    'luminosité' => "",
    'lidar' => "",
    'description' => ""
];


function isnotsetOrEmpty($variable)
{
    return !isset($_POST[$variable]) || empty($_POST[$variable]);
};

function verifyUserInput($list_param)
{

    foreach ($list_param as $key => $value) {
        if (isnotsetOrEmpty($key)) {
            return false;
        }
    }
    return true;
}

if (!verifyUserInput($list_param)) {
    $msg = "Tous les champs obligatoires ne sont pas remplis.";
} else {
    if (isset($_POST["end"])) {

        foreach ($list_param as $key => $value) {
            $list_param[$key] = $_POST[$key];
        }


        // ouvre la connexion et la stocke dans la variable $connection
        open_connection();

        $sql = "INSERT INTO Robots ( id_tete, id_corps, id_bras, id_jambes, distance, température, humidité, infrarouges, luminosité, lidar) VALUES (1, 2, 3, 1, 1, true, true, false, false, false, true)";
        $stmt = mysqli_prepare($connection, $sql);

        // "sss" signifie trois paramètres de type string
        mysqli_stmt_bind_param($stmt, "iiiiiiiiii",  $list_param);

        // Exécution et gestion du succès/échec
        if (mysqli_stmt_execute($stmt)) {
            $msg = "Votre robot a été crée avec succès !";
        } else {
            $msg = "Erreur : " . mysqli_error($connection);
        }
        close_connection();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <section class="fixed-navbar">
            <div class="header">
                <img src="" alt="logo">
                <h1>NEOBOT</h1>
            </div>
            <div class="creation-step">
                <a href="#">
                    🏠
                    <span>1. Base</span>
                </a>
                <a href="#">
                    💡
                    <span>2. Tête</span>
                </a>
                <a href="#">
                    ⚙️
                    <span>3. Corps</span>
                </a>
                <a href="#">
                    🏠
                    <span>4. Bras</span>
                </a>
                <a href="#">
                    💡
                    <span>5. Jambes</span>
                </a>
                <a href="#">
                    ⚙️
                    <span>6. Détails</span>
                </a>
                <a href="#">
                    ⚙️
                    <span>7. Nom</span>
                </a>
            </div>
        </section>

        <section class="main-content">
            <form action="" method="post">

                <div class="step 1">
                    <p>Etape 1 sur 7</p>
                    <h2>Choisissez votre base</h2>
                    <h3>Sélectionnez le type de base qui définira la silhouette et les capacités de votre robot</h3>
                    <div class="card">
                        <label for="">
                            <input type="radio" name="base" id="">
                            <img src="./img/rendu-robot-final.png" alt="robot">
                            <p>...</p>
                            <div class="actions">
                                <a href="#">
                                    🖋️
                                    <span>Modifier</span>
                                </a>
                                <a href="#">
                                    🗑️
                                    <span>Supprimer</span>
                                </a>
                            </div>
                        </label>
                    </div>
                    <div class="card">
                        <label for="">
                            <input type="radio" name="base" id="">
                            <img src="./img/rendu-robot-final.png" alt="robot">
                            <p>...</p>
                            <div class="actions">
                                <a href="#">
                                    🖋️
                                    <span>Modifier</span>
                                </a>
                                <a href="#">
                                    🗑️
                                    <span>Supprimer</span>
                                </a>
                            </div>
                        </label>
                    </div>
                    <div class="card">
                        <label for="">
                            <input type="radio" name="base" id="">
                            <img src="./img/rendu-robot-final.png" alt="robot">
                            <p>...</p>
                            <div class="actions">
                                <a href="#">
                                    🖋️
                                    <span>Modifier</span>
                                </a>
                                <a href="#">
                                    🗑️
                                    <span>Supprimer</span>
                                </a>
                            </div>
                        </label>
                    </div>
                    <div class="instructions">
                        <p>Chaque base possède des caractéristiques uniques dui influenceront les mouvements et les accessoires disponibles.</p>
                    </div>
                    <div class="buttons">
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 2">
                    <p>Etape 2 sur 7</p>
                    <h2>Personnalisez la tête</h2>
                    <h3>Choisissez la forme et les yeux de votre robot</h3>
                    <div class="step-two-container">
                        <p>Tête</p>
                        <p>Yeux</p>

                        <div class="head-choice">
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 2"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 3"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 4"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 5"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="head" id="">
                                <span><img src="" alt="photos pièces détachées tête 6"></span>
                            </label>
                        </div>

                        <!-- METTRE LES OPTIONS YEUX -->

                        <h4>Couleur de la tête</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                    <div class="buttons">
                        <a href="#">Retour</a>
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 3">
                    <p>Etape 3 sur 7</p>
                    <h2>Personnalisez le corps</h2>
                    <h3>Choisissez la forme du torse, les détails et les éléments techniques.</h3>
                    <div class="step-three-container">
                        <p>Forme</p>
                        <p>Détails</p>
                        <p>Energie</p>

                        <div class="torso-choice">
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="torso" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                        </div>

                        <!-- METTRE LES OPTIONS DETAILS
                        METTRE LES OPTIONS ENERGIE -->

                        <h4>Technologie du coeur</h4>
                        <div class="power-choice">
                            <label for="">
                                <input type="radio" name="power" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="power" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="power" id="">
                                <span><img src="" alt="photos pièces détachées torse 1"></span>
                            </label>
                        </div>

                        <h4>Couleur de la tête</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                    <div class="buttons">
                        <a href="#">Retour</a>
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 4">
                    <p>Etape 4 sur 7</p>
                    <h2>Personnalisez les bras</h2>
                    <h3>Choisissez le style et les outils pour les bras de votre robot</h3>
                    <div class="step-four-container">
                        <p>Bras</p>
                        <p>Outils</p>

                        <div class="arm-choice">
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="arm" id="">
                                <span><img src="" alt="photos pièces détachées bras 1"></span>
                            </label>
                        </div>

                        <!-- METTRE LES OPTIONS D'OUTILLAGES -->

                        <h4>Couleur des bras</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                    <div class="buttons">
                        <a href="#">Retour</a>
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 5">
                    <p>Etape 5 sur 7</p>
                    <h2>Personnalisez les jambes</h2>
                    <h3>Choisissez le style de jambes adapté votre robot</h3>
                    <div class="step-five-container">

                        <div class="leg-choice">
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                            <label for="">
                                <input type="radio" name="leg" id="">
                                <span><img src="" alt="photos pièces détachées jambes 1"></span>
                            </label>
                        </div>

                        <h4>Couleur des jambes</h4>
                        <!-- METTRE ZONE DE COULEURS ICI -->
                    </div>
                    <div class="buttons">
                        <a href="#">Retour</a>
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 6">
                    <p>Etape 6 sur 7</p>
                    <h2>Ajoutez des détails</h2>
                    <h3>Personnalisez les capacités et fonctionnalités de votre robot.</h3>
                    <div class="step-six-container">
                        <p>Audio</p>
                        <p>Vision</p>
                        <p>Capteurs</p>

                        <!-- METTRE DETAILS AUDIO
                        METTRE DETAILS VISON -->

                        <div class="details-choice">
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Capteur de distance</p>
                                <input type="checkbox" name="distance" id="">
                            </label>
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Capteur de température</p>
                                <input type="checkbox" name="température" id="">
                            </label>
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Capteur d'humidité</p>
                                <input type="checkbox" name="humidité" id="">
                            </label>
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Capteur infrarouges</p>
                                <input type="checkbox" name="infrarouges" id="">
                            </label>
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Capteur de luminosité</p>
                                <input type="checkbox" name="luminosité" id="">
                            </label>
                            <label for="">
                                <span><img src="" alt="photo capacité 1"></span>
                                <p>Lidar</p>
                                <input type="checkbox" name="lidar" id="">
                            </label>
                        </div>

                    </div>
                    <div class="buttons">
                        <a href="#">Retour</a>
                        <a href="#">Suivant</a>
                    </div>
                </div>

                <div class="step 7">
                    <p>Etape 7 sur 7</p>
                    <h2>Donnez un nom à votre robot</h2>
                    <h3>C'est la dernière étape ! Donnez-lui un nom et une description.</h3>

                    <label for="">Nom du robot</label>
                    <input type="text">

                    <label for="">Dans quel but avez-vous crée votre robot ?</label>
                    <label for="">
                        Assistance professionnelle
                        <input type="radio" name="purpose">
                    </label>
                    <label for="">
                        Assistance personnelle
                        <input type="radio" name="purpose">
                    </label>
                    <label for="">
                        Les deux
                        <input type="radio" name="purpose">
                    </label>


                    <label for="">description</label>
                    <textarea name="description" id=""></textarea>
                </div>

                <button name="end">Terminer et valider le robot</button>
            </form>
        </section>
    </main>
</body>

</html>