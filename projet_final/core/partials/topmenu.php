<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Wikifruit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- TODO: Dynamiser la classe active -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link<?php setActiveIfPageIs('index.php'); ?>" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php setActiveIfPageIs('listfruits.php'); ?>" href="listfruits.php">Liste des Fruits</a>
                </li>
                <?php

                // Boutons si pas connecté
                if(!isConnected()){ ?>

                    <li class="nav-item">
                        <a class="nav-link<?php setActiveIfPageIs('register.php'); ?>" href="register.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php setActiveIfPageIs('login.php'); ?>" href="login.php">Connexion</a>
                    </li>

                <?php
                // Boutons si connecté
                } else { ?>
                    <li class="nav-item">
                        <a class="nav-link<?php setActiveIfPageIs('logout.php'); ?>" href="logout.php">Déconnexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php setActiveIfPageIs('profil.php'); ?>" href="profil.php">Mon Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php setActiveIfPageIs('addfruit.php'); ?>" href="addfruit.php">Ajouter un Fruit</a>
                    </li>
                <?php
                }

                ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Chercher un fruit" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>