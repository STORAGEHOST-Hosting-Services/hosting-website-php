<?php

/**
 * This file contains the required functions to validate the login POST data.
 * @author Cyril Buchs
 * @version 1.0
 */

namespace User\Login;

session_start();

use ApiLogin;

require __DIR__ . "/php/api/ApiLogin.php";

global $error;

getFormData();

/**
 * This function will receive the data and validate it.
 * @return false|string
 */
function getFormData()
{
    /**if (!empty($_SESSION)) {
        header('Location: index.php');
    }*/

    global $error;

    $valid_form_data = array();

    if (!empty($_POST)) {

        if (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
            $valid_form_data['email'] = $_POST['email'];
        } else {
            $error = "L'email n'est pas valide.";
        }

        $api = new ApiLogin($valid_form_data['email'], $_POST['password']);

        // Call the function to check if the user exists in DB
        $result = $api->authenticate();

        if ($result['http_code'] == 200) {
            // Store the token in the session
            $_SESSION['token'] = (string)$result['data']->token;
            header('Location: index.php');
        } else {
            $error = $result['data']->message;
            if ($error == "username_or_password_incorrect") {
                $error = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            } elseif ($error == "account_not_enabled") {
                $error = "Le compte n'est pas activé. Contrôlez vos emails.";
            }
        }
    }
}

function getError(): string
{
    global $error;

    if ($error) {
        return "<p id=\"error\" class=\"text-danger\">$error</p>";
    } elseif (!empty($_GET['error'])) {
        return "<p id=\"error\" class=\"text-danger\">Votre session a expiré. Reconnectez-vous.</p>";
    } else {
        return "";
    }
}

require_once "php/user/login/view_login.php";