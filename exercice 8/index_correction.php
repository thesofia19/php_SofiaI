<?php
    // Création d'une array contenant des utilisateurs avec leurs infos (les pays sont eux-mêmes un sous sous-tableau)
    $userList = [
        [
            'name' => 'Lola',
            'age' => '32',
            'countries' => ['France', 'Italie'],
        ],
        [
            'name' => 'Jon',
            'age' => '26',
            'countries' => ['Japon'],
        ],
        [
            'name' => 'Bob',
            'age' => '71',
            'countries' => [],  // pas de pays visités donc array vide
        ],
        [
            'name' => 'Emma',
            'age' => '19',
            'countries' => ['France', 'Espagne'],
        ],
        [
            'name' => 'Sara',
            'age' => '26',
            'countries' => ['Espagne', 'France'],
        ],

    ];
?>


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
                -> p: Une phrase qui reprend toutes les infos

            BONUS: Rajouter dans le tableau une liste de tous les pays visités par chaque utilisateur et rajouter la liste des pays visité à l'affichage pour
            chaque utilisateur sous forme de liste à puces ul>li. (ATTENTION: si il n'y a pas de pays, au lieu d'avoir une liste vide, il doit y avoir un petit
            message type "Cet utilisateur n'a pas encore visité de pays")
        </p>
        <hr>

        <?php

        // On parcours tous les utilisateurs avec un foreach pour afficher une structure HTML pour chacun d'entre eux
        foreach($userList as $userInfos){

            // Titre h2 avec le prénom de l'utilisateur actuellement extrait par le foreach dans $userInfos
            echo '<h2>'. $userInfos['name'] .'</h2>';

            // Idem avec les infos dans une phrase
            echo '<p>Je me nomme ' . $userInfos['name'] .' et j\'ai '. $userInfos['age'] . ' ans!';
            echo '<p>Liste des pays visités :</p>';

            // Si l'utilisateur a visité au moins un pays (il faut que le tableau des pays soit d'une taille minimum de 1), alors
            // on affichera ces pays, sinon on ira dans le else pour afficher un message d'erreur
            if(count($userInfos['countries']) > 0){

                // Ouverture de la liste à puce
                echo '<ul>';

                // On parcours les pays pour les afficher un par un dans un li
                foreach($userInfos['countries'] as $country){
                    echo '<li>' . $country . '</li>';
                }

                // Fermeture de la liste à puce
                echo '</ul>';

            } else {

                echo '<p style="color:red;"> Cet utilisateur n\'a pas encore visité de pays !</p>';

            }

            // Trait de séparation entre les utilsateurs
            echo '<hr>';

        }

        ?>

    </body>
</html>