<?php
// Obligatoire pour pouvoir avoir accès aux sessions
session_start();

// Si l'array "user" existe en session, on crée un message d'erreur, sinon on le crée avec ses données et message de succès
 if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
    $error = 'Les variables ont déjà été créées !';
 } else {
     // L'array 'user' contiendra toutes les données de l'utilisateur connécté
    $_SESSION['user'] = [
        'firstname' => 'Sofia',
        'lastname' => 'Issaoune',
    ];

    $success = 'Les variables ont bien été crées !';
 }

?>


<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 15</title>
    </head>


    <body>
        <?php include 'menu.php' ?>

        <h1>Connexion</h1>

        <?php

        // Si la variable success existe, on l'affiche en vert
        if (isset($success)){
            echo '<p style="color:green;">' . $success . '</p>';
        }

        // Si la variable error existe, on l'affiche en rouge
        if (isset($error)){
            echo '<p style="color:red;">' . $error . '</p>';
        }

        ?>

    </body>
</html>