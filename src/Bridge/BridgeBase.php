<?php

namespace Virusphp\BridgingSatusehat\Bridge;

use Virusphp\BridgingSatusehat\Config\ConfigSatusehat;
use Virusphp\BridgingSatusehat\Foundation\Handler\SimpleCurlFactory;
use Virusphp\BridgingSatusehat\Foundation\Http\Authentication;

class BridgeBase extends SimpleCurlFactory 
{
	protected $auth;
	protected $access_token;
	protected $config;
	protected $endpointAuth = "accesstoken?grant_type=client_credentials";

	public function __construct()
	{
		$this->config = new ConfigSatusehat;
		$this->auth = new Authentication($this->config->setUrlAuth().$this->endpointAuth, $this->config->setCredentials());
		$this->access_token = $this->auth->setToken();
	}
	
	public function getRequest($endpoint)
    {
        $result = $this->request($this->config->setUrlBase().$endpoint, "GET", "",  $this->access_token);
        return $result;
    }

	public function postRequest($endpoint, $data)
    {
        $result = $this->request($this->config->setUrlBase().$endpoint, "POST", $data,  $this->access_token);
        return $result;
    }

	public function puttRequest($endpoint, $data)
    {
        $result = $this->request($this->config->setUrlBase().$endpoint, "PUT", $data,  $this->access_token);
        return $result;
    }
}