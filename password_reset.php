<?php

require __DIR__ . "/php/api/ApiPassword.php";

global $status;

get_form_data();

function get_form_data()
{
    global $status;

    if (!empty($_GET) && !empty($_POST)) {
        $email = urldecode($_GET['email']);
        $token = urldecode($_GET['token']);

        $password = $_POST['password'];
        $password_conf = $_POST['password_conf'];

        if ($password == $password_conf) {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if ($uppercase && $lowercase && $number && strlen($password) >= 8) {
                $result = (new ApiPassword($email, $token, $password))->update_password();

                if ($result['http_code'] == 204) {
                    // User password update successful
                    $status = "ok";
                }
            } else {
                $status = "password";
            }
        }
    }
}

function display_message()
{
    global $status;

    if ($status == "password") {
        return "<p class='text-danger'>Les mots de passe ne correspondent pas ou ne respectent pas les critères de sécurité.</p>";
    } elseif ($status == "ok") {
        return "<p class='text-success'>Le mot de passe a été modifié. Merci de vous <a href='login.php'>connecter</a>.</p>";
    } else {
        return "<p class='text-danger'>" . $status . "</p>";
    }
}

require_once __DIR__ . "/php/user/password/reset/view_password_reset.php";