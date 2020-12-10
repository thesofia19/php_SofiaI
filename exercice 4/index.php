
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 4</title>
    </head>


    <body>

        <h1>Exercice 4</h1>
        <p>
            Dans un fichier index.php, créer une structure HTML de base.
            Dans cette page , grâce à une boucle, générer une liste à puce HTML de 5000 lignes (chaque ligne devra afficher le numéro en cours).
            ATTENTION : le premier chiffre devra être le 1 et le dernier devra être 5000. L'itérateur devra obligatoirement commencer de zéro.
        </p>
        <hr>
        
        <!--on insère le "ul" en dehors des balises php-->
        <ul>
            <?php
            $i = 0;

            // On ajoute le $i++ avant le "echo" pour que l'incrémentation compte 1 avant de lancer la boucle
            while($i < 5000){
                $i++;
                echo '<li>'.$i.'</li>';
            }
            ?>
        </ul>
    </body>
</html>