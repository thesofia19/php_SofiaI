<?php

// 1ère étape: Appel de la variable color (1 champ de formulaire = 1 isset) : consiste à vérifier si TOUTES les variables du formulaire existent
if (isset($_POST['color'])){
    // On vérifie le bon nombre de caractères dans le formulaire
    if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10){
        $error = "La couleur choisie n'est pas valide<br>";
    }

    // si pas d'erreurs détectées
    if(!isset($error)){

        $pageColor = '<body style="background-color:' . htmlspecialchars($_POST['color']) . '"></body>';
        setcookie('colorChoice', htmlspecialchars($_POST['color']), time() + 60, null, null, false, true);
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


    <body>

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

        <?php
        echo $pageColor
        ?>

        <form action="index.php" method="POST">
            <label for="color">Couleur
                <input type="text" name="color">
            </label>
                <input type="submit">
        </form>



    </body>
</html>