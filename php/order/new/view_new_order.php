<?php

include __DIR__ . "/../../../php/includes/include_login.php";
require_once __DIR__ . "/../../../php/includes/UserInfo.php";

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
    <title>Panel STORAGEHOST - Hosting Services / Nouvelle commande</title>
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
        <h2 class="text-center mb-xl">Nouvelle commande</h2>
        <div class="container border-top mt-xl-3">
            <div class="row">
                <div class="col-md-8 text-left">
                    <form class="mt-xl-3" method="post">
                        <div class="form-group text-left">
                            <label for="exampleFormControlSelect1">Type de commande</label>
                            <select class="form-control" name="order_type" id="exampleFormControlSelect1"
                                    onchange="displayInfo(this)"
                                    required>
                                <option value="" selected disabled hidden>Choisissez votre offre...</option>
                                <optgroup label="Serveur d'application">
                                    <option value="app">Serveur d'application</option>
                                </optgroup>
                                <optgroup label="VPS">
                                    <option value="s1s">VPS s1.small</option>
                                    <option value="s1m">VPS s1.medium</option>
                                    <option value="s1l">VPS s1.large</option>
                                    <option value="s2s">VPS s2.small</option>
                                    <option value="s2m">VPS s2.medium</option>
                                    <option value="s2l">VPS s2.large</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">En passant commande, vous acceptez les
                                <a target="_blank" href="https://storagehost.ch/cgu-cgv">conditions générales de
                                    vente</a>.</label>
                        </div>
                        <div class="form-group mt-xl-3">
                            <p class="text-info">Pour le choix de l'OS, merci de vous rendre sur <a class=""
                                                                                                    href="https://discord.gg/2vFErQ8ggf">le
                                    serveur Discord de STORAGEHOST - Hosting Services</a>.</p>
                        </div>
                        <button class="btn btn-primary float-md-left mt-xl-3" type="submit">Créer la commande</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="mt-xl-3" id="info">
                    </div>
                </div>
                <script>
                    function displayInfo(sel) {
                        document.getElementById("info").innerHTML = getInfos(sel.options[sel.selectedIndex].value);

                        let select = document.getElementById('vps_info');
                    }

                    function displayInfoVps(sel) {

                    }
                </script>
            </div>
        </div>
    </section>
</main>
<?php
include __DIR__ . "/../../../php/includes/footer.php";
?>
</body>
</html