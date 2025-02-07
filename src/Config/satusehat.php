<?php

return [
	'api' => [
		'endpoint_auth'  => env('API_SATUSEHAT_AUTH', 'ENDPOINT-KAMU'),
		'endpoint_base'  => env('API_SATUSEHAT_BASE', 'ENDPOINT-KAMU'),
		'endpoint_consent'  => env('API_SATUSEHAT_CONSENT', 'ENDPOINT-KAMU'),
		'endpoint_kfa'  => env('API_SATUSEHAT_KFA', 'ENDPOINT-KAMU'),
		'endpoint_kfa_v2'  => env('API_SATUSEHAT_KFA_V2', 'ENDPOINT-KAMU'),
		'endpoint_kyc'  => env('API_SATUSEHAT_KYC', 'ENDPOINT-KAMU'),
		'client_id' => env('CLIENT_ID_SATUSEHAT', 'SECRET-KAMU'),
		'client_secret' => env('CLIENT_SECRET_SATUSEHAT', 'SECRET-KAMU'),
	]
];
