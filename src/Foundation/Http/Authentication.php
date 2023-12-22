<?php

namespace Virusphp\BridgingSatusehat\Foundation\Http;

use Virusphp\BridgingSatusehat\Foundation\Handler\SimpleCurlFactory;

class Authentication
{
    protected $bridge;
    protected $accessToken;

    public function __construct($endpoint, $dataClient)
    {
        $this->bridge = new SimpleCurlFactory;
        $response = $this->bridge->request($endpoint, "POST", $dataClient);
        $result = json_decode($response, true);
        $this->accessToken = $result['access_token'];
    }

    public function setToken()
    {
        return $this->accessToken;
    }
}