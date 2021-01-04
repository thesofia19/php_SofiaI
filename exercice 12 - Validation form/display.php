<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page Display</title>
    </head>
    <body>

        <?php

            if(isset($_GET['firstname']) && isset($_GET['email'])){
                echo 'Bonjour ' . htmlspecialchars($_GET['firstname']) . ', ton adresse email est ' . htmlspecialchars($_GET['email']);
            } else {
                echo 'Vous devez d\'abord passer par <a href="form.php">le formulaire</a> !';
            }

        ?>

    </body>
</html>