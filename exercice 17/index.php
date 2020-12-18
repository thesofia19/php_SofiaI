<?php

// Appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['pseudo'])&&
    isset($_POST['birthdate']) &&
    isset($_POST['password'])

){

    // Bloc des vérifs (condition dans le cas où c'est pas bon)

    // Doit être un email invalide (d'où le "!" pour inverser le sens) pour créer une erreur
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'L\'email doit être valide';
    }

    // Vérification du pseudo
    if (!preg_match('/^[a-z0-9A-Z\'àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]{2,25}$/', $_POST['pseudo'])){
        $errors[] = 'Pseudo invalide';
    }

    // Vérification du mot de passe
    if (!preg_match('/^.{8,4096}$/', $_POST['password'])){
        $errors[] = 'Mot de passe invalide';
    }


    // Vérification de la date de naissance
    if (!preg_match('/^(((0[1-9]|[12]\d|3[01])[\/\-](0[13578]|1[02])[\/\-]((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)[\/\-](0[13456789]|1[012])[\/\-]((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])[\/\-]02[\/\-]((19|[2-9]\d)\d{2}))|(29[\/\-]02[\/\-]((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/', $_POST['birthdate'])){
        $errors[] = 'La date de naissance n\'est pas valide';
    }

    // Si pas d'erreurs
    if(!isset($errors)){

        // Message de succès à afficher plus bas dans la page
        $success = 'Votre compte a bien été créé !';
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

        <h1>Exercice 17</h1>
        <p>
        Créer une nouvelle page index.php avec structure html de base. Dans cette page, créer un formulaire avec les champs suivants :<br>
        email
        pseudonyme
        mot de passe
        date de naissance
        <br>
        <br>
        Si le formulaire est envoyé, vérifier que les champs respectent les contraintes suivantes :
        email = doit être un email valide<br>

        pseudonyme = seulement entre 2 et 25 caractères (chiffres, lettres (min/maj), apostrophes et caractères accentués)<br>

        mot de passe = entre 8 et 4096 caractères (n'importe lesquels)<br>

        date de naissance = une date valide au format français (dd/mm/yyyy et dd-mm-yyyy) GOOGLE<br>

        Si il y a des erreurs, les afficher, sinon si il n'y a pas d'erreurs, afficher un message de succès type
        "Votre compte a bien été créé !" et masquer le formulaire.<br>

        BONUS : Modifier la vérification du mot de passe pour forcer les utilisateurs à mettre au moins une minuscule,
        une majuscule, un chiffre et un caractère spécial dans leur mot de passe.
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
                <label for="age">Pseudo
                    <input type="text" name="pseudo">
                </label>
                <label for="link">Mot de passe
                    <input type="password" name="password">
                </label>
                <label for="age">Date de naissance
                    <input type="text" name="birthdate">
                </label>
                    <input type="submit">
            </form>

            <?php
        }
        ?>

    </body>
</html>