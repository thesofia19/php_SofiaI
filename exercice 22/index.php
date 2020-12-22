<?php
// Connexion au fichier
$myFile = fopen('compteur.txt', 'r+');

// Récupération du nombre actuel de visite
$visits = fread($myFile, 12);

// Augmentation du nombre de visite de 1
$visits++;

// Remplacement du curseur PHP au début du fichier (pour écrire par dessus l'ancien number)
fseek($myFile, 0);

// Ecriture du nouveau nombre dans le fichier à la place de l'ancien
fwrite($myFile, $visits);

// Fermeture de la connexion
fclose($myFile);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 22</title>
</head>
<body>

    <h1>Exercice 22</h1>
    <p>
    1) Créer un fichier compteur.txt avec à l'intérieur le chiffre 0.<br><br>

    2) Créer un fichier index.php avec une structure html de base. Dans ce fichier, avec PHP, ouvrir le fichier compteur.txt, récupérer le nombre
    contenu dedans, lui ajouter +1 puis sauvegarder la nouvelle valeur dans le fichier. Une phrase type "Cette page a été vue xxx fois" devra être
    affichée sur la page.<hr>
    </p>

    <p>Cette page a été vue <?php echo $visits; ?> fois.</p>

</body>
</html>