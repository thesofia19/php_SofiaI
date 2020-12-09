<?php
    $color = 'pink';
    $name = 'Sofia';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 2</title>
        <style>
            body {
                background-color: <?php echo $color; ?>;
            }
        </style>
    </head>

    <body>
        <h1>Exercice 2</h1>
        <p>Exercice 2 :
            Créer dans un fichier index.php une structure de base html.
            Créer 2 variables : une contenant une couleur et une contenant un prénom.
            Faire en sorte que la couleur dans la variable fasse changer la couleur de fond de la page (body). Faire un titre h1 avec une phrase de
            salutation envers le prénom stocké.
        </p>
        <hr>
        <h1>Salut <?php echo $name;?>!</h1>
    </body>
</html>