<?php
//Appel des variables
if(
    isset($_FILES['photo']) &&
    isset($_POST['email'])
){

    $fileErrorCode = $_FILES['photo']['error'];

    // Vérification de l'email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'L\'email doit être valide';
    }

    // Vérification des codes d'erreurs
    if($fileErrorCode == 1 || $fileErrorCode == 2 || $_FILES['photo']['size'] > 2000000){
        $errors[] = 'La taille du fichier est trop grande';
    } else if($fileErrorCode == 3){
        $errors[] = 'Fichier non reçu en totalité, veuillez-ré-essayer';
    } else if($fileErrorCode == 4){
        $errors[] = 'Veuillez choisir une image !';
    } else if($fileErrorCode == 6 || $fileErrorCode == 7 || $fileErrorCode == 8){
        $errors[] = 'Problème serveur, ré-essayer plus tard';
    } else if ($fileErrorCode != 0) {
        $errors[] = 'Problème, veuillez ré-essayer';
    }

    // Vérification de l'image envoyée
    if ($fileErrorCode == "0"){
        $photoFormat = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);

        if($photoFormat != 'image/jpeg' && $photoFormat != 'image/png' && $photoFormat != 'image/gif'){
            $errors[] = 'Le format du fichier envoyé n\'est pas valide';
        }
    }

    // Si pas d'erreur
    if(!isset($errors)){
        if($photoFormat == 'image/jpeg'){
            $extToApply = 'jpg';
        }
        if($photoFormat == 'image/png'){
            $extToApply = 'png';
        }
        if($photoFormat == 'image/gif'){
            $extToApply = 'gif';
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . md5(time() + random_int(0, 999999)) .  $extToApply);
        $success = 'Votre image a bien été envoyée';
    }

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 23</title>
</head>
<body>

    <h1>Exercice 23</h1>
    <p>
    But : Créer un formulaire permettant d'envoyer une image (jpg, png ou gif).<br><br>

        - Le formulaire sera composé de 2 champs principaux : un champ email et un champ fichier.<br><br>

        - Si le formulaire est envoyé, créer et afficher des erreurs si les contraintes suivantes ne sont pas respectées :<br>
            * email doit être valide<br>
            * un fichier doit avoir été envoyé<br>
            * si le code d'erreur est égal à autre chose que 0, créer une erreur correspond au code d'erreur<br>
            * si le VRAI format du fichier n'est pas une image jpg, png ou gif, créer une erreur.<br>

        - Si tout est bon, sauvegarder l'image dans un sous dossier "images" en lui donnant comme nom l'empreinte md5 ( md5() ) du timestamp de
        la date actuelle concaténé avec un nombre aléatoire (GOOGLE pour trouver comment générer ce nombre). Afficher également un message de succès
        "Votre image a bien été envoyée !"<hr>
    </p>

    <?php

    // Affichage des erreurs si il y en a
    if(isset($errors)){
        foreach($errors as $error){
            echo '<p style="color:red;">' . $error . '</p>';
        }
    }

    // Affichage du message de succès si il existe, sinon formulaire
    if(isset($success)){
        echo '<p style="color:green;">' . $success . '</p>';
    }
        ?>

    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
        <input type="text" name="email">
        <input type="submit">
    </form>


</body>
</html>