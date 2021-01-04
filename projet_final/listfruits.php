<?php

// Inclusion du fichier des fonctions
require 'core/functions.php';

// Connexion à la bdd
$bdd = connectDb();

$getFruits = $bdd->query('SELECT fruits.*, users.pseudonym as user_pseudonym FROM fruits INNER JOIN users ON fruits.user_id = users.id');

$fruits = $getFruits->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des fruits - Wikifruit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <?php include 'core/partials/topmenu.php'; ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-md-8 offset-md-2 py-5">
                <h1 class="pb-4 text-center">Liste des Fruits</h1>

                <table class="table table-hover col-12 mt-4">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Pays d'origine</th>
                            <th>Ajouté par</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($fruits as $fruit){
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fruit['name']); ?></td>
                                <td><?php echo ucfirst($fruitCountries[$fruit['origin']]); ?></td>
                                <td><?php echo htmlspecialchars($fruit['user_pseudonym']); ?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>