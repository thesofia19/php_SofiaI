<?php
// Appel des variables
if(
    isset($_GET['search'])
){
    // Bloc des verifs

    // Vérification du champ de recherche
    if (mb_strlen($_GET['search']) < 1 || mb_strlen($_GET['search'] > 50)){
        $error[] = 'La recherche n\'est pas valide';
    }

    // Si pas d'erreurs
    if(!isset($error)){

        // Connexion à la bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=1_intro;charset=utf8', 'root', 'root');
            $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            die('Problème avec la bdd : ' . $e->getMessage());
        }

        // Récupération des fruits dont le nom contient la recherche envoyée par le formulaire
        $searchFruits = $bdd->prepare('SELECT * FROM fruits WHERE name LIKE ?');

        // On envoie la recherhe
        $searchFruits->execute([
            '%' . $_GET['search'] . '%'
        ]);

        $fruits = $searchFruits->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture de la requête
        $searchFruits->closeCursor();

        // Si ça a bien fonctionné (statut contiendra true si c'est le cas, sinon false)
        if($searchFruits){
            $success = 'Vos éléments ont bien été ajoutés !';
        } else {
            $errors[] = 'Problème interne au site, veuillez ré-essayer plus tard';
        }

    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 21</title>
    <style>
        table tr td, table tr th{
            border: 1px solid black;
            padding: 5px 10px;
        }
        table{
            border-collapse: collapse;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Exercice 21</h1>
    <p>
    1) Créer un fichier index.php avec un formulaire html GET avec un champ de recherche.<br><br>

    2) Si le formulaire est envoyé, vérifier les contraintes suivantes sinon faire et afficher des erreurs :<br>
    recherche : comprise entre minimum 1 et 50 caractères maximum<br><br>

    3) Si il n'y a pas d'erreurs, faire un select dans la table des fruits avec un LIKE pour récupérer tous les fruits dont le nom contient
    la recherche venant du formulaire.<br><br>

    4) Si il a des fruits à afficher, les afficher sous la forme d'un tableau HTML avec toutes leurs infos dedans
    (nom, couleur, prix, origine). Si la recherche ne donne aucun résultat, afficher un message en rouge en dessous du formulaire pour l'indiquer.
    (le prix devra être indiqué en € avec le symbole)<br><br>

    BONUS)
    1) Faire en sorte que le nom des fruits ainsi que le nom de leur origine soit toujours affiché avec une majuscule au début.
    2) Si il y a des fruits à afficher, mettre une petite phrase en dessous du formulaire indiquant le nombre de résultats trouvé
    (type "Il y a x résultats à votre recherche").<hr></p>

    <form action="index.php" method="GET">
        <input type="text" placeholder="Recherche" name="search">
        <input type="submit">
    </form>

    <?php
    if(isset($errors)){
    echo '<p style="color:red;">' . $error . '</p>';
    }

    if(!empty($fruits)){
        echo '<p>Il y a ' . count($fruits) . ' résultat(s) pour la recherche "' . htmlspecialchars($_GET['search']) . '" :</p>';

        ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Couleur</th>
                        <th>Origine</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($fruits as $fruit){
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars(ucfirst($fruit['name'])) . '</td>';
                            echo '<td>' . htmlspecialchars(ucfirst($fruit['color'])) . '</td>';
                            echo '<td>' . htmlspecialchars(ucfirst($fruit['origin'])) . '</td>';
                            echo '<td>' . htmlspecialchars(ucfirst($fruit['price'])) . ' €</td>';
                            echo '</td>';
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }

    ?>

</body>
</html>