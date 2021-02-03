<?php

require_once __DIR__ . "/php/api/ApiOrder.php";

global $gb_orders;

session_start();

function get_orders()
{
    global $gb_orders;
    $api = new ApiOrder($_SESSION['token'], array());

    // Call the function to check if the user exists in DB
    $result = $api->get_user_order();

    //var_dump($result);

    if ($result['http_code'] == 200 && !empty($result['data']->data)) {
        // Parse the result
        $orders = $result['data']->data;
        $gb_orders = $orders;
        foreach ($orders as $order) {
            echo "<div class='col-12 col-md-8 text-left boxes mt-2'>";
            echo "<strong>N° de commande :</strong> " . $order->id . "<br/>";
            echo "<strong>Type de commande :</strong> " . get_order_type($order->order_type) . "<br/>";
            echo "<strong>Date :</strong> " . $order->date;
            echo "</div>";
            echo "<div class='col-12 col-md-4 text-left mt-4 mb-3'>";
            echo "<a href='#' onclick='displayWip()' class='text-info'>Voir les informations de la commande</a><br/>";
            echo "<a href='#' onclick='displayWip()' class='text-danger'>Demander un remboursement</a>";
            echo "</div>";
        }

    } else {
        echo "<p class='text-left col-md-8'>Vous n'avez pas de commandes.</p>";
    }
}

function get_order_type($order_type): string
{
    // Cast order type to string
    $order_type = (string)$order_type;

    $result = "";

    switch ($order_type) {
        case "app":
            $result = "Serveur d'application";
            break;
        case "s1s":
            $result = "VPS s1.small";
            break;
        case "s1m":
            $result = "VPS s1.medium";
            break;
        case "s1l":
            $result = "VPS s1.large";
            break;
        case "s2s":
            $result = "VPS s2.small";
            break;
        case "s2m":
            $result = "VPS s2.medium";
            break;
        case "s2l":
            $result = "VPS s2.large";
            break;
    }

    return $result;
}

require_once "php/order/view_order.php";