<?php

use function User\Register\getError;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="pics/favicon.ico">

    <title>Panel - STORAGEHOST / Enregistrement</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
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
    <!-- Custom styles for this template -->
    <link href="css/register.css" rel="stylesheet"/>
</head>

<body class="container text-center">

<form action="register.php" method="post">
    <img src="assets/images/logo.png" alt="Logo de STORAGEHOST - Hosting Services."/>
    <h1 class="h3 mb-3 font-weight-normal">Création de compte</h1>

    <div class="row form-signup">
        <div class="col-md-6">
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Doe" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="John" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@example.com"
                       required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Center 1" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip">Code postal (ZIP)</label>
                <input type="number" id="zip" name="zip" class="form-control" placeholder="1234" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="Pofadder" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="country">Pays</label>
                <select id="country" class="form-control" name="country">
                    <option class="form-select selected disabled">Choisissez le pays...</option>
                    <option value="Suisse" class="form-select">Suisse</option>
                    <option value="France" class="form-select">France</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">N° de téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="000 000 00 00" required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="********"
                       required
                       autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password_conf">Confirmation de mot de passe</label>
                <input type="password" id="password_conf" name="password_conf" class="form-control"
                       placeholder="********"
                       required>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">S'enregistrer</button>
        </div>
    </div>

    <?= getError(); ?>

    <p class="mt-md-3 text-center">Vous avez déjà un compte ? <a href="login.php">Connectez-vous !</a></p>

    <p class="mt-5 mb-3 text-muted">&copy; 2021 STORAGEHOST - Hosting Services</p>
</form>
</body>
</html>