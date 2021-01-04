<?php

// 1ère étape: Appel des variables (1 champ de formulaire = 1 isset) : consiste à vérifier si TOUTES les variables du formulaire existent
if (
    isset($_POST['firstname']) &&
    isset($_POST['name'])&&
    isset($_POST['age'])
){

    // 2ème étape: bloc des vérifs (1 champ = 1 structure conditionnelle) : consiste pour chaque champ à vérifier qu'il contient bien des données valides

    if (mb_strlen($_POST['firstname']) < 2 || mb_strlen($_POST['firstname']) > 50){
        $errors[] = 'Prénom pas bon !';
    }

    if (mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 50){
        $errors[] = 'Nom pas bon !';
    }

    if (!is_numeric($_POST['age']) || $_POST['age'] < 0 || $_POST['age'] > 150 || !ctype_digit($_POST['age'])){
        $errors[] = 'Age pas bon !';
    }

    // 3ème étape: si le formulaire n'a pas d'erreur, on fait les actions post-formulaire
    if (!isset($errors)){
        // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
        $successMsg = 'Bonjour ' . htmlspecialchars($_POST['firstname']) . ' ' . htmlspecialchars($_POST['name']) .
        ' , tu as ' . htmlspecialchars($_POST['age']) . ' ans !';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 13</title>
    </head>


    <body>

        <h1>Exercice 13</h1>
        <p>
        Dans un fichier index.php, avec une structure HTMl de base, créer un formulaire avec 3 champs : <br>
            prénom, nom et age.

        Sur ce même fichier, si le formulaire a été envoyé, vérifier que les champs respectent les vérifications suivantes :
            - prénom doit comporter entre 2 et 50 caractères
            - nom doit comporter entre 2 et 50 caractères
            - age doit être un nombre entier compris entre 0 et 150 inclus

        Toutes les erreurs doivent être affichées en même temps au dessus du formulaire.

        Si il n'y aucune erreur, afficher un message de succès du type "Bravo x y , tu as z ans !"

        Notes :
            - Il ne doit JAMAIS y avoir d'erreurs PHP, qu'importe la situation.
            - Pas de failles XSS possibles
            - Si jamais le message de succès est affiché, le formulaire ne doit plus apparaître (pas de CSS ni de JS nécessaire pour ça !)
        </p>
        <hr>

        <?php

        // Si l'array $errors existe, alors on le parcours avec un foreach et on affiche les erreurs qu'il contient
        if (isset($errors)){
            foreach($errors as $error){
                echo '<p style="color:red;">'. $error .'</<p>';
            }
        }

        // Si la variable $successMsg existe, alors on l'affiche, sinon on affiche le formulaire dans le else
        if (isset($successMsg)){
            echo '<p style="color:green;">'. $successMsg .'</<p>';
        } else {

            ?>
                <form action="index.php" method="POST">
                    <label for="firstname">Prénom
                        <input type="text" name="firstname">
                    </label>
                    <label for="name">Nom
                        <input type="text" name="name">
                    </label>
                    <label for="mail">Age
                        <input type="number" name="age">
                    </label>
                        <input type="submit">
                </form>

            <?php
        }

        ?>

    </body>
</html>