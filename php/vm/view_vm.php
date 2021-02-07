<?php

include "php/includes/include_login.php";
require_once "php/includes/UserInfo.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/png" href="../../assets/images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Panel STORAGEHOST - Hosting Services / VM</title>
    <script>
        function displayWip() {
            alert("Cette fonctionnalité n'est pas encore implémentée ! Merci de contacter l'administrateur par email à admin@storagehost.ch ou d'appeler le +41 77 506 19 14.")
        }
    </script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png"
                 alt="Logo de STORAGEHOST - Hosting Services."/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="vm.php">Vos machines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php">Vos commandes</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="logout.php">
                <p style="margin-bottom: 0; margin-right: 8px;" class="mr-sm-2">
                    Bienvenue <strong><?= (new UserInfo())->get_name(); ?></strong></p>
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Déconnexion</button>
            </form>
        </div>
    </nav>
</header>
<main style="margin-top: 15px;" class="container-fluid text-center bg-light2 mt-xl-3">
    <section class="container">
        <h2 class="text-center mb-xl">Vos machines virtuelles</h2>
        <?php if ($_GET['message'] == "vm_created") {
            echo "<p class='text-success'>Votre machine a bien été créée ! <br/> Votre machine peut prendre jusqu'à 48h pour être installée En cas de questions, contactez l'administrateur.</p>";
        } ?>
        <div class="container border-top mt-xl-3">
            <div class="row">
                <div class="col-md-12 col-8 mt-xl-3">
                    <h4 class="text-left"><strong>Vos machines virtuelles</strong></h4>
                    <div class="row">
                        <?= get_vms(); ?>
                    </div>
                </div>
            </div>
    </section>
</main>
<footer class="footer-orders">
    <div style="margin-left: 0; width: auto; padding: 0 15px;"><span>© STORAGEHOST - Hosting Services</span></div>
</footer>
</body>
</html>