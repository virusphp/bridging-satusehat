<?php

namespace Virusphp\BridgingSatusehat\Foundation\Handler;

class SimpleCurlFactory
{

    CONST HEADER = ['Content-Type: Application/json'];

    public function request($endpoint, $method = "POST", $payload = "", $header = null)
	{
		 // Set default headers
		$defaultHeaders = self::HEADER;

		// Override headers based on method and additional header
		if (!empty($method) && $header !== null) {
			$defaultHeaders = [
				'Connection: close',
				'Content-Type: application/json',
				'Authorization: Bearer ' . $header
			];
		} elseif (!empty($method) && $method == "POST") {
			$defaultHeaders = ['Connection: close', 'Content-Type: application/x-www-form-urlencoded'];
		}

		// Set request type
		$isPost = strtoupper($method) === "POST";

		// Set cURL options
		$curlOptions = [
			CURLOPT_VERBOSE => true,
			CURLOPT_TIMEOUT => 3,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => $defaultHeaders,
			CURLOPT_POST => $isPost,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_TCP_KEEPALIVE => 1,
			CURLOPT_TCP_KEEPIDLE => 60,
			CURLOPT_TCP_NODELAY => 1,
			CURLOPT_ENCODING => 'gzip, deflate',
		];

		// Initialize cURL session
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt_array($ch, $curlOptions);

		// Execute cURL session
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);

		// Close cURL session
		curl_close($ch);

		return $result;

	}
}