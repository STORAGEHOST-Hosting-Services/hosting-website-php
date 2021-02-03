<?php


use JetBrains\PhpStorm\ArrayShape;

class ApiRegister
{
    private array $form_data;

    public function __construct(array $form_data)
    {
        $this->form_data = $form_data;
    }

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function register(): array
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('lastname' => $this->form_data['lastname'], 'firstname' => $this->form_data['firstname'], 'email' => $this->form_data['email'], 'address' => $this->form_data['address'], 'zip' => $this->form_data['zip'], 'city' => $this->form_data['city'], 'country' => $this->form_data['country'], 'phone' => $this->form_data['phone'], 'password' => $this->form_data['password'], 'password_conf' => $this->form_data['password_conf']),
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