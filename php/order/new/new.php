<?php

require_once __DIR__ . "/../../../php/api/ApiOrder.php";
require_once __DIR__ . "/../../../php/api/ApiVm.php";
require __DIR__ . "/../../Config.php";

session_start();

global $status;

post_orders();

function post_orders()
{
    // Get the form data
    if (!empty($_POST)) {
        //var_dump($_POST);
        $form_data['order_type'] = $_POST['order_type'];

        $api = new ApiOrder($_SESSION['token'], $form_data);

        // Call the function to check if the user exists in DB
        $result = $api->create_order();
        //var_dump($result);

        if ($result['http_code'] == 201) {
            //var_dump($result['data']);
            // The request is successful, redirect to the VM page
            $url_string = "order_id=" . $result['data'][0]->data->order_id . "&order_type=" . $result['data'][0]->data->order_type . "&user_id=" . $result['data'][0]->data->user_id;
            header('Location: ' . Config::SITE_URL . '/php/vm/new/new.php?data=' . base64_encode($url_string));
            //var_dump($result['data'][0]->data);
            //return create_vm((int)$result['data'][0]->data->order_id);
        } else {
            echo $result;
        }
    }
}

require_once "view_new_order.php";
