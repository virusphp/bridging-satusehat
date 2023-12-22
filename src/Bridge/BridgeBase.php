<?php

namespace Virusphp\BridgingSatusehat\Bridge;

use Virusphp\BridgingSatusehat\Config\ConfigSatusehat;
use Virusphp\BridgingSatusehat\Foundation\Handler\SimpleCurlFactory;
use Virusphp\BridgingSatusehat\Foundation\Http\BridgeAuth;

class BridgeBase extends SimpleCurlFactory 
{
	protected $access_token;
	protected $config;
	protected $endpointAuth = "accesstoken?grant_type=client_credentials";

	public function __construct()
	{
		$this->config = new ConfigSatusehat;
		$this->access_token = new BridgeAuth($this->endpointAuth, $this->config->setCredentials());
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




	
}