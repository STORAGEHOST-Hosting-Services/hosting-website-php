<?php

require_once __DIR__ . "/../../api/ApiVm.php";

session_start();

//var_dump($_SESSION);

get_form_data();

function get_form_data()
{
    if (!empty($_POST)) {
        $form_data['username'] = $_POST['username'];
        $form_data['password'] = $_POST['password'];
        $form_data['os'] = $_POST['os'];
        $form_data['order_type'] = $_POST['order_type'];
        $form_data['order_number'] = $_POST['order_number'];

        // Change order_type
        $form_data['order_type'] = get_order_type($form_data['order_type']);

        $valid_form_data = array();

        // Validate data
        if (strpos($form_data['username'], ".") || strpos($form_data['username'], ",") || strpos($form_data['username'], "_") || strpos($form_data['username'], "@") || strpos($form_data['username'], "@") || strpos($form_data['username'], "@")) {
            echo "<script>alert('Le nom dutilisateur nest pas valide.')</script>";
            return;
        } else {
            $valid_form_data['username'] = $form_data['username'];
        }

        // Check if password follows AD security requirements
        $uppercase = preg_match('@[A-Z]@', $form_data['password']);
        $lowercase = preg_match('@[a-z]@', $form_data['password']);
        $number = preg_match('@[0-9]@', $form_data['password']);

        if ($uppercase && $lowercase && $number && strlen($form_data['password']) >= 8) {
            $valid_form_data['password'] = $form_data['password'];
        } else {
            echo "<script>alert('Le mot de passe nest pas valide.')</script>";
            return;
        }

        //var_dump($valid_form_data);
        //var_dump($form_data);

        // Make the API call
        $result = (new ApiVm($_SESSION['token'], $valid_form_data['username'], $valid_form_data['password'], $form_data['os'], $form_data['order_type'], $form_data['order_number']))->create_vm();

        if ($result['http_code'] == 201) {
            // VM created successfully, redirect to VM page
            header('Location: ' . Config::SITE_URL . '/vm.php?message=vm_created');
        } else {
            //var_dump($result);
        }
    }
}

function get_order_type(string $order_type): string
{
    return match ($order_type) {
        "VPS s1.small" => "s1s",
        "VPS s1.medium" => "s1m",
        "VPS s1.large" => "s1l",
        "VPS s2.small" => "s2s",
        "VPS s2.medium" => "s2m",
        "VPS s2.large" => "s2l",
    };
}

require_once __DIR__ . "/view_new_vm.php";