<?php

namespace Virusphp\BridgingSatusehat\Config;

use Dotenv\Dotenv;

class ConfigSatusehat
{
    protected $urlAuth;
    protected $urlBase;
    protected $urlConsent;
    protected $urlKfa;
    protected $urlKfaV2;
    protected $clientId;
    protected $clientSecret;
    protected $token;
    protected $header;
    protected $timestamps;

    public function __construct()
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
        $dotenv->safeLoad();

        $this->urlAuth = getenv('API_SATUSEHAT_AUTH');
        $this->urlBase = getenv('API_SATUSEHAT_BASE');
        $this->urlConsent = getenv('API_SATUSEHAT_CONSENT');
        $this->urlKfa = getenv('API_SATUSEHAT_KFA');
        $this->urlKfaV2 = getenv('API_SATUSEHAT_KFA_V2');
        $this->clientId = getenv('CLIENT_ID_SATUSEHAT');
        $this->clientSecret = getenv('CLIENT_SECRET_SATUSEHAT');
    }

    public function setUrlAuth()
    {
        return $this->urlAuth;
    }

    public function setUrlBase()
    {
        return $this->urlBase;
    }

    public function setUrlConsent()
    {
        return $this->urlConsent;
    }

    public function setUrlKfa()
    {
        return $this->urlKfa;
    }

    public function setUrlKfaV2()
    {
        return $this->urlKfaV2;
    }

    public function setClientId()
    {
        return $this->clientId;
    }

    public function setClientSecret()
    {
        return $this->clientSecret;
    }

    public function setCredentials()
    {
        $data = [
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret
        ];

        return http_build_query($data);
    }
}
