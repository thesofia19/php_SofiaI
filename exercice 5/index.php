
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 5</title>
    </head>


    <body>

        <h1>Exercice 5</h1>
        <p>
            Idem que l'exercice 4, mais cette fois-ci avec une boucle "for".
        </p>
        <hr>

        <ul>
            <?php

            for($i = 0; $i < 5000; $i++){
                echo '<li>'.($i + 1).'</li>';
            }

            ?>
        </ul>
    </body>
</html>