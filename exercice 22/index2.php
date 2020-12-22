<?php
// Récupération du nombre actuel de visite
$visits = file_get_contents('compteur.txt');

// Augmentation du nombre de visite de 1
$visits++;

// Sauvegarde du nouveau nombre dans le fichier compteur.txt
file_put_contents('compteur.txt', $visits);
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
    affichée sur la page.<br><br>

    3) Créer un fichier index2.php et refaire dedans l'exercice précedent, mais en utilisant file_get_contents et file_put_contents à la place des fopen,
    fread, fwrite, fseek et fclose.<hr>
    </p>

    <p>Cette page a été vue <?php echo $visits; ?> fois.</p>

</body>
</html>