<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 8</title>
    </head>


    <body>

        <h1>Exercice 8</h1>
        <p>
            Dans un fichier index.php (avec structure html de base), créer un tableau multidimensionnel contenant au moins 5 sous tableaux avec des infos
            sur des utilisateurs (au moins 2 infos). Grâce à une boucle foreach, afficher toutes les infos des utilisateurs sous la forme suivante:<br>
                -> h2: Nom de l'utilsateur <br>
                -> p: Une phrase qui reprend toutes les infos <br>

            BONUS: Rajouter dans le tableau une liste de tous les pays visités par chaque utilisateur et rajouter la liste des pays visité à l'affichage pour
            chaque utilisateur sous forme de liste à puces ul>li. (ATTENTION: si il n'y a pas de pays, au lieu d'avoir une liste vide, il doit y avoir un petit
            message type "Cet utilisateur n'a pas encore visité de pays")
        </p>
        <hr>

        <?php

        $users = [
            [
                'name' => 'Lola',
                'birthdate' => '21/02/1999',
                'country' => 'Espagne'
            ],
            [
                'name' => 'Jon',
                'birthdate' => '30/04/1997',
                'country' => 'Angleterre'
            ],
            [
                'name' => 'Bob',
                'birthdate' => '18/11/2000',
                'country' => 'France'
            ],
            [
                'name' => 'Emma',
                'birthdate' => '13/09/1996',
                'country' => 'Belgique'
            ],
            [
                'name' => 'Sara',
                'birthdate' => '19/12/1994',
                'country' => 'Italie'
            ],

        ];

        foreach($users as $user){
            echo '<h2>'. $user['name'] .'</h2>';
            echo '<p>Je me nomme ' . $user['name'] .' et je suis né le '. $user['birthdate'] . '. Je vis en '. $user['country'] .'.</p>';
        }


        ?>
    </body>
</html>