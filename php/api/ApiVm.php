<?php

use JetBrains\PhpStorm\ArrayShape;

class ApiVm
{
    private string $token;
    private string $username;
    private string $password;
    private string $instance_type;
    private string $os;
    private int $order_id;

    public function __construct(string $token, string $username, string $password, string $os, string $instance_type, int $order_id)
    {
        $this->token = $token;
        $this->username = $username;
        $this->password = $password;
        $this->instance_type = $instance_type;
        $this->os = $os;
        $this->order_id = $order_id;
    }

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function create_vm(): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/vms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('username' => $this->username, 'password' => $this->password, 'instance_type' => $this->instance_type, 'os' => $this->os, 'order_id' => $this->order_id),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token
            ),
        ));

        $response = curl_exec($curl);

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return array(
            'http_code' => $http_code,
            'data' => json_decode($response)
        );
    }
}