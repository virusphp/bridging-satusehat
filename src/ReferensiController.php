<?php

namespace Virusphp\BridgingSatusehat;

use Symfony\Component\HttpFoundation\Request;
use Virusphp\BridgingSatusehat\Bridge\BridgeBase;

Class ReferensiController 
{
	// use Bpjs;	
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeBase;
	}

	public function practition($nik)
	{
		$endpoint = 'Practitioner?identifier='. $nik;
		return $this->bridging->getRequest($endpoint);
	}

	
	// public function decompressed()
	// {
	// 	$string = "e0GidhtXDQLftE2O2PXx6IFbJxAWc36xyOihLSNDdGyLSIuvSbWIomLRNWmLBTsCaDTgcT8cP7tzSdokmQFZE27SmOQhzVOrVVCdCY69NGKP9sGWxsD3VKIM25gz7KKeii17z2Gy8ViiQqo0Rbl6UWHmYsPIYcFrWDNzxsh2TnyuX1mQsMDxLjReDCj2sMMnJeFlZBI\/ntW6c9DaSwv88ZwRd06ydlXLmk\/9WBIWG2QJPpAB7ck2rVm4Dt3pK29oZKOkt\/w\/tjnkG1uSaLpCLyZd1ePHT\/f9m7i\/U9\/4M2XIpN4Kv4EJiNSAuReEZpZxKSniQCUq8EU4Ehq\/rB1Gsiy6vQ6h0+fVRFTBKcisQNrwf2Jr1S6baCDR8oYKWwXYNZJsBRJhb2CDDWcc0JAy3qnc9gmbL3biHdMAue5y55sfJTuF7B9AshKX\/+Ke6kTVoL7TtEDIzFTWqphwLyOx17iY8PetIhQJTKUIphpkfja3qUp+LvNRMqey4MA++9r5ebzLaF0E+sSoKN4NPnwZbIitohUtIs1dtZNr5qIezLPui\/PJXWL6zIp1hDSKVeNJQAE5T+626Ae6ajexqHKiN9wQ4S2REkSsuxRTHMT1TFqkP55r\/ZuLy3Xs7tTo7zaY8+xhiswD5PyqUBOzWFGNdKLJbQmzc4\/N4WjdmoXXzECOGT1agzyKuwfARcZGVef0";
	// 	$string1 = "DJW11EJGblMxoxnrpJGyX5iqw0A92fWHw8pWytjby4SNfU2ijr5tgNi1aNlMYf6vudDchoW4BLSLpkeDTh59SlS51LwOw88+YIdSGlL8Jo90vBiXoZDXD8jPcuuOGLIBSxP6xijU/rM89HRnXnv96Ap6p96mcTpPwPexB3MGiaOLvAww1QMk77IVoYPQ/DNF9+qAp8+fJb9QFbRzXYQ29nkzAh3m/N9q8X9evgOv/Jn/4oa330U14+x/sK4Dvrza5+pIJZAv8IILi2J4MXvGfc0YyKtn3jmvRJpbFnJ13UY8QG90pImJwCcFwdxXyC/VQ47ReHo14RukZ10vgX3frAi+vwYMi5Nr5yc+jUv/OS0Yl+7nFOdE2oKi6yfe9TdxEUG3R8dplsuhs1T12AwJBXTPZ8vI2qBTq5N9jsSW8NM=";
	// 	$key1 = "11895rsk24t0n1640762772";
	// 	$key = "11895rsk24t0n". GenerateBpjs::bpjsTimestamp();
	// 	$data = GenerateBpjs::decompress(GenerateBpjs::stringDecrypt($key1, $string1));
	// 	return response($data);
	// }

	// public function getHistoryPelayanan($nokartu, $kodedokter)
	// {
	// 	$data['param'] = $nokartu;
	// 	$data['kodedokter'] = (int)$kodedokter;
	// 	$data = json_encode($data);
	// 	$endpoint = "api/rs/validate";
	// 	return $this->icare->postRequest($endpoint, $data);
	// }
}