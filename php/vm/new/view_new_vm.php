<?php

if (empty($_SESSION)) {
    header('Location: ' . Config::SITE_URL . '/login.php?error=session_expired');
}

require_once __DIR__ . "/../../../php/includes/UserInfo.php";

if (empty($_GET)) {
    header('Location: ' . Config::SITE_URL . '/order.php');
} else {
    $decoded_url = explode('&', base64_decode($_GET['data']));

    $order_id = explode('=', $decoded_url[0])[1];
    $order_type = explode('=', $decoded_url[1])[1];
    $user_id = explode('=', $decoded_url[2])[1];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/png" href="../../../assets/images/favicon.ico"/>
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
    <link rel="stylesheet" href="../../../css/style.css"/>
    <script src="../../../js/script.js"></script>
    <title>Panel STORAGEHOST - Hosting Services / Nouveau VPS</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <a class="navbar-brand" href="../../../index.php">
            <img src="../../../assets/images/logo.png"
                 alt="Logo de STORAGEHOST - Hosting Services."/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../vm.php">Vos machines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../order.php">Vos commandes</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="../../../logout.php">
                <p style="margin-bottom: 0; margin-right: 8px;" class="mr-sm-2">
                    Bienvenue <strong><?= (new UserInfo())->get_name(); ?></strong></p>
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Déconnexion</button>
            </form>
        </div>
    </nav>
</header>
<main style="margin-top: 15px;" class="container-fluid text-center bg-light2 mt-xl-3">
    <section class="container">
        <h2 class="text-center mb-xl">Nouveau VPS</h2>
        <p class="text-success">Merci de votre commande ! <br/> Un email de confirmation de commande vous a été envoyé.
        </p>
        <p>Utilisez le formulaire ci-dessous pour créer votre VPS.</p>
        <div class="container border-top mt-xl-3">
            <div class="row">
                <div class="col-md-8 text-left">
                    <form class="mt-xl-3" method="post">
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="johndoe"
                                   required>
                            <p class="text-danger text-left mt-1">Le nom d'utilisateur ne doit pas
                                contenir de point, de virgule ou de tiret du bas !</p>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="********" required>
                            <p class="text-danger text-left mt-1">8 caractères, 1 chiffre, 1 lettre majuscule au minimum
                                !</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Système d'exploitation (OS)</label>
                            <select class="form-control" name="os" id="exampleFormControlSelect1"
                                    onchange="displayInfo(this)"
                                    required>
                                <option value="" selected disabled hidden>Choisissez l'OS...</option>
                                <optgroup label="Linux">
                                    <option value="debian10">Debian 10</option>
                                    <option value="centos8">CentOS 8</option>
                                    <option value="ubuntu2004">Ubuntu 20.04</option>
                                    <option value="winsrv">Windows Server 2016 Core</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order_type">Type de commande</label>
                            <input type="text" class="form-control" id="order_type" name="order_type"
                                   value="<?= $order_type ?>"
                                   readonly="readonly" required>
                        </div>

                        <div class="form-group">
                            <label for="order_number">N° de commande</label>
                            <input type="text" class="form-control" id="order_number" name="order_number"
                                   value="<?= $order_id ?>"
                                   readonly="readonly" required>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Vous confirmez que les informations
                                ci-dessus sont correctes. Elles ne pourront pas être changées.</label>
                        </div>
                        <button class="btn btn-primary float-md-left mt-3 mb-3" type="submit">Créer le VPS</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="footer-orders">
    <div style="margin-left: 0; width: auto; padding: 0 15px;"><span>© STORAGEHOST - Hosting Services</span></div>
</footer>
</body>
</html