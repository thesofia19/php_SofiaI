<?php

    // Fonction permettant d'afficher le contenu d'une variable avec un print_r entouré d'une balise html <pre>
    function print_rv2($elementToDisplay){
        echo '<pre>';
            print_r($elementToDisplay);
        echo '</pre>';
    }

    // Fonction qui retourne un prix initial additionné avec une taxe précisée en second paramètre (20% par défaut)
    function getTTCPrice($htPrice, $tax = 20){

        return $htPrice * (($tax / 100) + 1);
    }


    $fruits = [pomme, banane, fraise, orange, kiwi, cerise, melon];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 9</title>
    </head>


    <body>

        <h1>Exercice 9</h1>
        <p>
            1) Créer une nouvelle fonction "print_rv2" qui devra récupérer en paramètre un élément à afficher et devra l'afficher avec un print_r entouré de
            echo 'pre';. <br> Créer un array $fruits avec des fruits dedans et l'afficher avec la nouvelle fonction "print_rv2()"<br> <br> 

            2) Créer une nouvelle fonction "getTTCPrice()" permettant de calculer le prix TTC à partir d'un prix HT passé en paramètre. BONUS: créer un deuxième
            paramètre optionnel permettant de choisir le taux de TVA.
        </p>
        <hr>

        <?php

            // Affichage de l'array des fruits avec la nouvelle fonction
            print_rv2($fruits);
        ?>
        <hr>
        <?php
            // Affichage du prix TTC de 19€
            echo getTTCPrice(50, 19.6);
        ?>

    </body>
</html>