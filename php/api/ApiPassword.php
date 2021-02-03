<?php


use JetBrains\PhpStorm\ArrayShape;

class ApiPassword
{
    private string $email;
    private string $token;
    private string $password;

    /**
     * ApiPassword constructor.
     * @param mixed $email
     * @param string $token
     * @param string $password
     */
    public function __construct(string $email, string $token, string $password)
    {
        $this->email = $email;
        $this->token = $token;
        $this->password = $password;
    }

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function send_email(): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/users/password',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $this->email)
        ));

        $response = curl_exec($curl);

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return array(
            'http_code' => $http_code,
            'data' => json_decode($response)
        );
    }

    #[ArrayShape(['http_code' => "mixed", 'data' => "mixed"])] public function update_password(): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.panel.storagehost.ch/api/users/password/reset',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $this->email, 'token' => $this->token, 'password' => $this->password)
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