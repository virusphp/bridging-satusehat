<?php

// namespace Virusphp\BridgingSatusehat;

// use Symfony\Component\HttpFoundation\Request;
// use Virusphp\BridgingSatusehat\Bridge\BridgeBase;

// Class ReferensiController 
// {
// 	protected $bridging;

// 	public function __construct()
// 	{
// 		$this->bridging = new BridgeBase;
// 	}

// 	public function practition($nik)
// 	{
// 		$endpoint = 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|'. $nik;
// 		return $this->bridging->getRequest($endpoint);
// 	}

// 	public function patient($nik)
// 	{
// 		$endpoint = 'Patient?identifier=https://fhir.kemkes.go.id/id/nik|'. $nik;
// 		return $this->bridging->getRequest($endpoint);
// 	}
// }