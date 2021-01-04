<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 12</title>
    </head>


    <body>

        <h1>Exercice 12</h1>
        <p>
        Créer 2 fichiers avec une structure html de base: form.php et contact.php <br>

        Dans le fichier form.php, créer un formulaire html avec 2 champs : prénom et mail. Quand le formulaire sera validé, le visiteur
        sera redirigé sur la page display.php qui elle devra afficher une phrase du type "Bonjour xxxxxxx, ton adresse email est xxxx"
        <br>

        ATTENTION : si l'utilisateur essaye d'aller sur la page display.php sans passer par le formulaire, il ne doit pas y avoir d'erreurs PHP,
        mais plutôt un message du type "Veuillez passer par le formulaire".
        </p>
        <hr>

        <form action="display.php" method="GET">
            <label for="firstname">Prénom
                <input type="text" name="firstname">
            </label>
            <label for="email">Mail
                <input type="email" name="email">
            </label>
            <input type="submit">
        </form>

    </body>
</html>