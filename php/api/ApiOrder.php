<?php

use JetBrains\PhpStorm\ArrayShape;

class ApiOrder
{
    private string $token;
    private array $form_data;

    public function __construct(string $token, array $form_data)
    {
        $this->token = $token;
        $this->form_data = $form_data;
    }

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function get_user_order(): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/users/me/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
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

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function create_order(): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/users/me/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token
            ),
            CURLOPT_POSTFIELDS => array('order_type' => $this->form_data['order_type']),
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