<?php
    $admin = true;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 3</title>
        <style>
            .text{
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    

    <body>
    
        <h1>Exercice 3</h1>
        <p>
            Dans un fichier index.php, créer une structure HTML de base.
            Créer 1 variable "$admin" contenant un booléen (true ou false).

            Si la personne est admin, afficher un texte (paragraphe) indiquant à l'utilisateur qu'il est le bienvenu et lui mettre un lien (fictif) vers
            une autre page. Sinon, afficher un texte d'erreur (en rouge et en gras) lui indiquant que cette page est réservée aux admin.
        </p>
        <hr>

        <?php
            if ($admin = false){
                echo '<p>Bienvenue à vous cher administrateur <a href="https://www.ecosia.org/">voici le lien</a></p>';
            } else {
                echo '<p class="text">Attention, cette page est réservée uniquement aux admin</p>';
            }
        ?>



    </body>
</html>