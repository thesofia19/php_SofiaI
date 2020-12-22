<?php
// Appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm'])
){
    // Bloc des verifs

    // Vérification de l'email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'L\'email doit être valide';
    }

    // Vérification du mot de passe
    if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
        $errors[] = 'Mot de passe invalide';
    }

    // Vérification de la confirmation du mot de passe
    if ($_POST['confirm'] != $_POST['password']){
        $errors[] = 'La confirmation ne correspond pas au mot de passe';
    }

    // Si pas d'erreurs
    if(!isset($errors)){

        // Second bloc de verif (si email pas déjà pris)


        // Connexion à la bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=2_cours;charset=utf8', 'root', 'root');
            $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e){
            die('Problème avec la bdd : ' . $e->getMessage());
        }

        // Pour vérifier si le compte existe, il suffit de faire un select avec l'email
        $checkIfExists = $bdd->prepare('SELECT * FROM accounts WHERE email = ?');

        $checkIfExists->execute([
            $_POST['email']
        ]);

        $account = $checkIfExists->fetch(PDO::FETCH_ASSOC);

        // Si $account n'est pas vide, ça veut dire qu'un compte a été trouvé, donc message d'erreur
        if(!empty($account)){
            $errors[] = 'Cette adresse mail est déjà prise, veuillez en mettre une autre !';
        }

        // Si pas d'erreurs
        if(!isset($errors)){

            // Requête préparée pour créer un nouveau compte (requête préparée car il y a des variables PHP à mettre dedans, donc on se protège des injections SQL)
            $addUser = $bdd->prepare("INSERT INTO accounts(email, password, register_date) VALUES(?, ?, ?)");

            // Execution de la requête en liant les 3 marqueurs à leurs variables PHP
            $statut = $addUser->execute([
                $_POST['email'],        // Email envoyé dans le formulaire donc $_POST['email']
                password_hash($_POST['password'], PASSWORD_BCRYPT),     // On stocke le hash du mot de passe
                date('Y-m-d H:i:s')     // On stocke la date actuelle au moment de l'execution
            ]);

            // Fermeture de la requête
            $addUser->closeCursor();

            // Si ça a bien fonctionné (statut contiendra true si c'est le cas, sinon false)
            if($statut){
                $success = 'Votre compte a bien été créé !';
            } else {
                $errors[] = 'Problème interne au site, veuillez ré-essayer plus tard';
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
</head>
<body>

    <h1>Exercice 20</h1>
    <p>
    1) Créer une nouvelle table de données "accounts" avec les champs suivants: id, email(varchar 320), password(char(60)), register_date(datetime)<br><br>

    2) Créer un fichier register.php avec un formulaire html POST avec les champs suivants : email, mot de passe, confirmation du mot de passe.<br><br>

    3) Si le formulaire est envoyé, vérifier les contraintes suivantes sinon faire et afficher les erreurs :<br>
        email -> email valide<br>
        mot de passe -> au moins 8 caractères avec min/maj chiffre et caractère spécial<br>
        confirmation du mot de passe -> strictement identique au mot de passe<br><br>

    4) Si il n'y a pas d'erreurs, créer un nouveau compte dans la table "accounts" avec les infos venant du formulaire.<br><br>

    Note :
        - pour les mots de passe, il faudra stocker leur empreinte avec BCRYPT (password_hash)<br>

    BONUS: Si jamais l'adresse email est déjà prise, mettre une erreur à l'utilisateur pour qu'il en mette une autre.<hr></p>

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
    } else {

        ?>

        <form action="register.php" method="POST">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Mot de Passe" name="password">
            <input type="password" placeholder="Confirmer le mot de passe" name="confirm">
            <input type="submit">
        </form>

        <?php
    }
    ?>

</body>
</html>