<?php

// Appel des variables
if(isset($_POST['email']) &&
    isset($_POST['age']) &&
    isset($_POST['link'])
){

    // Bloc des vérifs (condition dans le cas où c'est pas bon)

    // Doit être un email invalide (d'où le "!" pour inverser le sens) pour créer une erreur
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'L\'email doit être valide';
    }

    // Idem avec URL
    if (!filter_var($_POST['url'], FILTER_VALIDATE_URL)){
        $errors[] = 'Adresse de site invalide';
    }

    // Doit être soit pas un chiffre, soit plus petit que 0 soit plus grand que 150 pour créer une erreur
    if (!filter_var($_POST['age'], FILTER_VALIDATE_INT) || $_POST['age'] > 150 || $_POST['age'] < 0){
        $errors[] = 'Age doit être un entier valide entre 0 et 150';
    }

    // Si pas d'erreurs
    if(!isset($errors)){

        // Message de succès à afficher plus bas dans la page
        $success = 'Vos données ont bien été récoltées, merci pour ça !';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 16</title>
    </head>


    <body>

        <h1>Exercice 16</h1>
        <p>
        Créer un fichier index.php avec une structure HTML de base. Dans ce fichier, créer un formulaire HTML POST qui demande une adresse email,
        un âge et le lien du site site préféré.<br>
        <br>
        Si le formulaire est envoyé, vérifier que les champs respectent les contraintes suivantes, sinon afficher des erreurs :<br>

        - âge doit être un entier positif entre 0 et 150<br>
        - adresse email doit être une adresse email valide<br>
        - lien du site doit être un lien URL valide.<br>
        <br>
        Si il n'y a pas d'erreurs, afficher un message de succès type "Vos données ont bien été récoltées, merci pour ça !" et le formulaire ne doit
        plus apparaître.
        </p>
        <hr>

        <?php

        // Si il y a des erreurs, on les affiche avec un foreach
        if (isset($errors)){
            foreach($errors as $error){
                echo '<p style="color:red;">' . $error . '</p>';
            }
        }

        // Affichage du message de succès
        if(isset($success)){
            echo '<p style="color:green;">' . $success . '</p>';
        } else {

            ?>

            <form action="index.php" method="POST">
                <label for="email">Adresse Mail
                    <input type="email" name="email">
                </label>
                <label for="age">Age
                    <input type="text" name="age">
                </label>
                <label for="link">Lien du site préféré
                    <input type="text" name="url">
                </label>
                    <input type="submit">
            </form>

            <?php
        }
        ?>

    </body>
</html>