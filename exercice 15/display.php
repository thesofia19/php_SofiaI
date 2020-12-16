<?php

// Obligatoire pour avoir accès aux sessions
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 15</title>
    </head>


    <body>

        <h1>Exercice 15</h1>
        <p>
        1) Créer 3 pages avec une structure html de base et un titre h1 différent : display.php, create.php, destroy.php <br>
        <br>
        2) Créer un fichier menu.php qui contiendra un menu HTML (css interdit) permettant de naviguer entre les 3 pages.
        Ce menu devra être inclu dans les 3 pages.<br>
        <br>
        3) Quand l'utilisateur va sur la page create :<br>
        Si les variables de session "firstname" et "lastname" n'existent pas, les créer en mettant un nom et un prénom dedans
        (n'importe lesquels) et afficher un message indiquant que les variables ont bien été créées !<br>
        Si les variables existent déjà en session, afficher un message du type "Les variables existent déjà !"<br>
        <br>
        4) Sur la page display, si les variables existent en session, afficher un phrase du type "Bonjour x y !",
        sinon afficher une phrase invitant l'utilisateur à aller sur la page create.php<br>
        <br>
        5) Sur la page destroy.php, supprimer la session et afficher un message type "La session a bien été supprimée !"
        </p>
        <hr>

        <?php include 'menu.php'?>

        <h1>Display</h1>

        <?php

        // Si l'array user existe en session (ce qui revient à dire que l'utilisateur est connecté), on affiche une phrase de bienvenue à l'utilisateur,
        // sinon un message invitant à se connecter
        if(isset($_SESSION['user'])){
            echo 'Bienvenue sur votre compte ' . htmlspecialchars($_SESSION['user']['firstname']) . ' ' . htmlspecialchars($_SESSION['user']['lastname']) . ' !';
        } else {
            echo 'Merci de vous connecter d\' abord ! <a href="create.php">Connexion</a>';
        }


        ?>


    </body>
</html>