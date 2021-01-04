<!--Possibilité d'insérer le tableau dans cette zone
<?php
$names = ['Tom', 'Bob', 'Lola', 'Emma', 'Sara', 'Jon', 'Alex', 'Lidia', 'Marie', 'Max'];
?>-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 6</title>
    </head>


    <body>

        <h1>Exercice 6</h1>
        <p>
            Créer un array contenant des prénoms (au moins 10). Afficher tous les prénoms de l'array sous la forme d'un liste à puce HTML
            sous la forme suivante : (utilisation d'une boucle obligatoire)
        </p>
        <hr>

        <ul>
            <?php

            $names = ['Tom', 'Bob', 'Lola', 'Emma', 'Sara', 'Jon', 'Alex', 'Lidia', 'Marie', 'Max'];

            // On récupère la taille de l'array avec count()
            $arrayLength = count($names);

            //for($i = 0; $i < 10; $i++){
            for($i = 0; $i < $arrayLength; $i++){
                echo '<li>'.$names[$i].'</li>';
            }

            ?>
        </ul>
    </body>
</html>