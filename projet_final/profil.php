<?php

// Inclusion du fichier des fonctions
require 'core/functions.php';

// Bloque la page si l'utilisateur n'est pas connecté
mustBeConnected();

$registerDate = new DateTime($_SESSION['user']['register_date']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Wikifruit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <?php include 'core/partials/topmenu.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 py-5">
                <h1 class="pb-4 text-center">Mon Profil</h1>
                <div class="row">
                    <div class="col-md-6 col-12 offset-md-3 my-4">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Email</strong> : <?php echo htmlspecialchars($_SESSION['user']['email']); ?></li>
                            <li class="list-group-item"><strong>Pseudo</strong> : <?php echo htmlspecialchars($_SESSION['user']['pseudonym']); ?></li>
                            <li class="list-group-item"><strong>Date d'inscription</strong> : <?php echo $registerDate->format('d/m/Y H:i:s'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>