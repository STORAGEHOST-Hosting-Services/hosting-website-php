<?php

session_start();

//var_dump($_SESSION);

global $user_vms;

// Get VMs
function get_vms()
{
    global $user_vms;

    // Get infos of the user
    $user_vms = (new ApiInfo($_SESSION['token']))->get_user_vms();

    if ($user_vms['http_code'] == 200 && !empty($user_vms['data'])) {
        //var_dump($user_vms);
        foreach ($user_vms['data'] as $user_vm) {
            if ($user_vm->power_status == 0) {
                echo "<p class='text-left'>Votre machine " . $user_vm->hostname . " ne s'exécute pas actuellement</p><br/>";
                // VM is shutted down, do not show it
            } else {
                echo "<div class='col-6 text-left boxes mt-xl-2'>";
                echo "<strong>Nom d'hôte :</strong> " . $user_vm->hostname . ".hosting.storagehost.net<br/>";
                echo "<strong>Adresse IP de management :</strong> " . $user_vm->ip . "<br/>";
                echo "<strong>Système d'exploitation :</strong> " . get_os_name($user_vm->os) . "<br/>";
                echo "<strong>Type d'instance :</strong> " . get_instance_name($user_vm->instance_type) . "<br/>";
                echo "<strong>N° de commande :</strong> " . $user_vm->order_id . "<br/>";
                echo "</div>";
                echo "<div class='col-6 mt-4 text-left'>";
                echo "<div class='row'>
<a href='console.php?data=" . base64_encode($user_vm->hostname) . "' target='_blank' class='btn btn-info mx-auto'>Se connecter</a>
<button class='btn btn-success mx-md-auto mx-sm-4' onclick='displayWip()'>Démarrer l'instance</button>
<button class='btn btn-danger mx-md-auto mx-sm-3' onclick='displayWip()'>Stopper l'instance</button>
</div>";
            }
        }
    } else {
        return "<p class='text-left'>Vous n'avez pas de machines virtuelles.</p>";
    }
}

require "php/home/view_home.php";