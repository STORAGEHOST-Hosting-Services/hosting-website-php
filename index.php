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
                echo "<div class='col-12 mt-xl-2'>";
                echo "<p class='text-left'>Votre machine " . $user_vm->hostname . " ne s'exécute pas actuellement.</p><br/>";
                echo "</div>";
                // VM is shutted down, do not show it
            } else {
                echo "<div class='col-6 text-left boxes mt-xl-2'>";
                echo "<strong>Nom d'hôte :</strong> " . $user_vm->hostname . ".hosting.storagehost.net<br/>";
                echo "<strong>Adresse IP de management :</strong> " . $user_vm->ip . "<br/>";
                echo "<strong>N° de commande :</strong> " . $user_vm->order_id . "<br/>";
                echo "</div>";
                echo "<div class='col-6 mt-4 text-left'>";
                echo "<div class='row'>";
                echo "<a class='text-info' href='https://panel.storagehost.ch/vm.php#" . $user_vm->hostname ."'>Gérer la machine</a>";
                echo "</div>";
            }
        }
    } else {
        return "<p class='text-left'>Vous n'avez pas de machines virtuelles.</p>";
    }
}

require "php/home/view_home.php";