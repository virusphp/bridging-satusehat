<?php

namespace Virusphp\BridgingSatusehat\Bridge;

use Virusphp\BridgingSatusehat\Config\ConfigSatusehat;
use Virusphp\BridgingSatusehat\Foundation\Handler\SimpleCurlFactory;
use Virusphp\BridgingSatusehat\Foundation\Http\Authentication;

class BridgeKfaV2 extends SimpleCurlFactory
{
	protected $auth;
	protected $access_token;
	protected $config;
	protected $endpointAuth = "accesstoken?grant_type=client_credentials";

	public function __construct()
	{
		$this->config = new ConfigSatusehat;
		$this->auth = new Authentication($this->config->setUrlKfaV2() . $this->endpointAuth, $this->config->setCredentials());
		$this->access_token = $this->auth->setToken();
	}

	public function getRequest($endpoint)
	{
		$result = $this->request($this->config->setUrlKfaV2() . $endpoint, "GET", "",  $this->access_token);
		return $result;
	}

	public function postRequest($endpoint, $data)
	{
		$result = $this->request($this->config->setUrlKfaV2() . $endpoint, "POST", $data,  $this->access_token);
		return $result;
	}

	public function puttRequest($endpoint, $data)
	{
		$result = $this->request($this->config->setUrlKfaV2() . $endpoint, "PUT", $data,  $this->access_token);
		return $result;
	}
}
