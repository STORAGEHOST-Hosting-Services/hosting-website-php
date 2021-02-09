<?php

session_start();

//var_dump($_SESSION);

function get_vms()
{
    global $gb_orders;
    $api = new ApiInfo($_SESSION['token']);

    // Call the function to check if the user exists in DB
    $result = $api->get_user_vms();

    //var_dump($result);

    if ($result['http_code'] == 200 && !empty($result['data'])) {
        // Parse the result
        $vms = $result['data'];
        foreach ($vms as $vm) {
            //var_dump($vm);
            echo "<div class='col-12 col-md-6 text-left col-sm-12 boxes mt-2 mb-4' id='$vm->hostname'>";
            echo "<strong>Nom d'hôte :</strong> " . $vm->hostname . ".hosting.storagehost.net<br/>";
            echo "<strong>Adresse IP de management :</strong> " . $vm->ip . "<br/>";
            echo "<strong>Système d'exploitation :</strong> " . get_os_name($vm->os) . "<br/>";
            echo "<strong>Type d'instance :</strong> " . get_instance_name($vm->instance_type) . "<br/>";
            echo "<strong>N° de commande :</strong> " . $vm->order_id . "<br/>";
            echo "</div>";
            echo "<div class='col-12 col-md-6 col-sm-12 mt-4 text-left'>";
            echo "<div class='row'>
<a href='console.php?data=" . base64_encode($vm->hostname) . "' target='_blank' class='btn btn-info mx-auto'>Se connecter</a>
<button class='btn btn-success mx-auto' onclick='displayWip()'>Démarrer l'instance</button>
<button class='btn btn-danger mx-auto' onclick='displayWip()'>Stopper l'instance</button>
</div>
</div>";
        }
    } else {
        return "<p class='text-left'>Vous n'avez pas de commandes.</p>";
    }
}

function get_instance_name(string $instance_type)
{
    return match ($instance_type) {
        "s1s" => "VPS s1.small",
        "s1m" => "VPS s1.medium",
        "s1l" => "VPS s1.large",
        "s2s" => "VPS s2.small",
        "s2m" => "VPS s2.medium",
        "s2l" => "VPS s2.large",
    };
}

function get_os_name(string $os)
{
    return match ($os) {
        "debian10" => "Debian 10",
        "centos8" => "CentOS 8",
        "ubuntu2004" => "Ubuntu 20.04",
        "winsrv" => "Windows Server 2016",
        "s2m" => "VPS s2.medium",
        "s2l" => "VPS s2.large",
    };
}


require_once "php/vm/view_vm.php";