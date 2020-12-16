<?php

// Par défaut on assigne la couleur grey à $newcolor pour éviter d'avoir une couleur vide dans le cas où il n'y a pas de formulaire ou de cookie.
$newColor = '#BBBBBB';

// Si le cookie de sauvegarde de la couleur existe, $newColor prendra la couleur stockée dedans
if(isset($_COOKIE['backgroundColor'])){
    $newColor = $_COOKIE['backgroundColor'];
}

// Même chose que les 4 lignes du dessus avec une condition ternaire :
// $newColor = (isset($_COOKIE['backgroundColor'])) ? $_COOKIE['backgroundColor'] : '#BBBBBB';

// Appel des variables
if(isset($_POST['color'])){

    // Bloc des vérifs
    if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10){
        $error = 'Vous devez remplir le champ de couleur';
    }

    // Si pas d'erreur
    if(!isset($error)){

        // $newColor contiendra la couleur envoyée dans le formulaire
        $newColor = $_POST['color'];

        // On crée un nouveau cookie pour la nouvelle couleur
        setcookie('backgroundColor', $_POST['color'], time() + 24 * 3600, null, null, false, true);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercice 14</title>
    </head>


    <body style="background-color: <?php echo htmlspecialchars($newColor); ?>;">

        <h1>Exercice 14</h1>
        <p>
        1) Créer un formulaire avec un champ permettant de récupérer une couleur (soit type = color, soit text à taper à la main).
        Quand ce formulaire est envoyé, vérifier que la valeur reçu comprennent entre 2 et 10 caractères, sinon erreur ! Si pas d'erreur,
        changer la couleur de fond de la page avec la couleur reçu par le formulaire.<br>

        2) Faire en sorte avec un cookie de sauvegarder la dernière couleur envoyée et de l'utiliser pour que cette couleur reste en fond tout le temps
        même en quittant la page et en revenant plus tard (au moins 1 jour).<br>

        ATTENTION : Le changement de couleur doit être instantané, il ne faut pas que le changement se fasse après plusieurs actualisations.
        </p>
        <hr>

        <form action="index.php" method="POST">
            <label for="color">Couleur
                <input type="color" name="color">
            </label>
                <input type="submit">
        </form>

        <?php

        // Si le message d'erreur existe, on l'affiche
        if(isset($error)){
            echo '<p style="color:red;">' . $error . '</p>';
        }

        ?>

    </body>
</html>