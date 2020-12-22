<?php

// Inclusion de la fonction permettant de vérifier si le captcha est valide ou pas
require 'recaptchaValid.php';

// Appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirmPassword']) &&
    isset($_POST['g-recaptcha-response'])
){

    // Bloc des verifs

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email invalide !';
    }

    if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
        $errors[] = 'Le mot de passe doit contenir au moins 8 caractères dont une minuscule, une majuscule, un chiffre et un caractère spécial !';
    }

    if($_POST['password'] != $_POST['confirmPassword']){
        $errors[] = 'La confirmation ne correspond pas au mot de passe !';
    }

    // Vérification du captcha
    if(!recaptchaValid($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR'])){
        $errors[] = 'La confirmation ne correspond pas au mot de passe !';
    }

    // Si pas d'erreurs
    if(!isset($errors)){

        // Second bloc de verif (si email pas déjà pris)

        // Connexion à la bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            die('Problème avec la base de données : ' . $e->getMessage());
        }

        // Pour vérifier si le compte existe, il suffit de faire un select avec l'email
        $checkIfExists = $bdd->prepare('SELECT * FROM accounts WHERE email = ?');

        $checkIfExists->execute([
            $_POST['email']
        ]);

        $account = $checkIfExists->fetch(PDO::FETCH_ASSOC);

        // Si $account n'est pas vide, ça veux dire qu'un compte a été trouvé, donc message d'erreur
        if(!empty($account)){
            $errors[] = 'Cette adresse email est déjà prise, veuillez en mettre une autre !';
        }

        // Si pas d'erreurs
        if(!isset($errors)){

            // Requête préparée pour créer le nouveau compte (requête préparée pour protéger des injections SQL car il y a des variables dedans)
            $addUser = $bdd->prepare('INSERT INTO accounts(email, password, register_date) VALUES(?, ?, ?)');

            // Execution de la requête
            $statut = $addUser->execute([
                $_POST['email'],    // Email envoyé dans le formulaire donc $_POST['email']
                password_hash($_POST['password'], PASSWORD_BCRYPT),     // On stock le hash du mot de passe
                date('Y-m-d H:i:s')     // On stocke la date actuelle au moment de l'execution
            ]);



            // Si ça a bien fonctionné ($statut contiendra true si c'est le cas, sinon false)
            if($statut){
                $success = 'Votre compte a bien été créé !';
            } else {
                $errors[] = 'Problème avec le site, veuillez ré-essayer plus tard !';
            }

        }

    }

}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 20</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>

    <?php

    // Affichage des erreurs si il y en a
    if(isset($errors)){
        foreach($errors as $error){
            echo '<p style="color:red;">' . $error . '</p>';
        }
    }

    if(isset($success)){
        echo '<p style="color:green;">' . $success . '</p>';
    } else {

        ?>

        <form action="register.php" method="POST">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Mot de passe" name="password">
            <input type="password" placeholder="Confirmation mot de passe" name="confirmPassword">
            <div class="g-recaptcha" data-sitekey="6LeJihAaAAAAAAPTLnIKUORnaulKC532oDyNyMkA"></div>
            <input type="submit">
        </form>

        <?php
    }
    ?>

</body>
</html>