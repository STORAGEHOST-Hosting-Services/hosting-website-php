<?php

use JetBrains\PhpStorm\Pure;

get_console();

function get_console()
{
    if (!empty($_GET)) {
        $instance_name = base64_decode($_GET['data']);

        // Contact the console
        echo "<iframe src='https://$instance_name.hosting.storagehost.ch'></iframe>";
    }
}

#[Pure] function get_instance_name(): bool|string
{
    return base64_decode($_GET['data']);
}

require_once __DIR__ . "/php/console/view_console.php";
