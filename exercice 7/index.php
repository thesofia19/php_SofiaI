<!--Possibilité d'insérer le tableau dans cette zone
<?php
$names = ['Tom', 'Bob', 'Lola', 'Emma', 'Sara', 'Jon', 'Alex', 'Lidia', 'Marie', 'Max'];
?>-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 7</title>
        <style>
            .color {
                color: red;
                font-weight: bold;
            }
        </style>

    </head>


    <body>

        <h1>Exercice 7</h1>
        <p>
            Créer un array $userInfos contenant au moins 5 informations sur un utilisateur et les afficher en dessous dans une phrase.
            Les infos de l'array dans la phrase devront être en rouge et en gras.
        </p>
        <hr>

        <?php

        $userInfos = [
            'name' => 'Stuart',
            'firstname' => 'James',
            'country' => 'Ecosse',
            'age' => '25',
            'pseudo' => 'Jstu12'
        ];

        echo 'Votre nom est <span class="color">'.$userInfos['name'].'</span> et votre prénom est <span class="color">'.$userInfos['firstname'].'</span> . <br> Vous avez <span class="color">'.$userInfos['age'].'</span> ans, et habitez en <span class="color">'.$userInfos['country'].'</span> . <br> Votre pseudo sera <span class="color">'.$userInfos['pseudo'].'</span> .'

        ?>
    </body>
</html>