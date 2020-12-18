<?php
    // Tentative de connexion à la base de données
    try{

        $bdd = new PDO('mysql:host=localhost;dbname=1_intro;charset=utf8', 'root', 'root');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(Exception $e){
        // Si la connexion a échouée, le die() stoppe la page et affiche un message
        die('Problème avec la base de données : ' .$e ->getMessage());
    }

    // Si $_GET['color'] existe dans l'url, alors on cherchera tous les fruits de cette couleur, sinon on récupèrera tous les fruits (dans le else)
    if(isset($_GET['color'])){
        // Requête pour récupérer tous les fruits dont la couleur est celle présente dans l'URL (requête préparée car on a une variable PHP dans la requête)
        $response = $bdd->prepare('SELECT * FROM fruits WHERE color = ?');
        $response->execute([
            $_GET['color']
        ]);

    } else {
        // Requête pour récupérer tous les fruits (requête directrice (query) car on a pas de variable PHP dans la requête)
        $response = $bdd->query('SELECT * FROM fruits');
    }

    // Récupération des fruits sous forme d'arrays associatifs
    $fruits = $response->fetchAll(PDO::FETCH_ASSOC);

    // Fermeture de la requête
    $response->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 18</title>
    </head>


    <body>

        <h1>Exercice 18</h1>
        <p>
        1) Dans un fichier index.php, avec une structure html de base, se connecter à la base de données, y récupérer la liste complète de tous les fruits puis
        les afficher dans une liste à puce html (ul li) sous cette forme :<br>
            <ul>
                <li>pomme rouge</li>
                <li>poire jaune</li>
                <li>etc...</li>
            </ul>
        Si la base de données ne contient pas de fruit, afficher un message du type "Aucun fruit à afficher" à la place de la liste.
        <br>
        2) Modifier l'exercice de telle manière à ne récupéerer que les fruits dont la couleur est passée dans l'URL en donnée GET: <br>
            Ex: index.php?color=red     --> Seulement les fruits rouges seront récupérer et affichés

        <hr>

        <?php

        // Si il y a des fruits à afficher, on les affiche dans une liste ul li, sinon message d'erreur
        if(!empty($fruits)){

            echo '<ul>';

            // Chaque fruit sera dans un 'li'
            foreach($fruits as $fruit){
                echo '<li>' . htmlspecialchars($fruit['name']) . ' ' . htmlspecialchars($fruit['color']) . '</li>';
            }
            echo '</ul>';

        }else {
            echo '<p style=color:red;>Aucun fruit à afficher</p>';
        }

        ?>

    </body>
</html>