<?php

return [
	'api' => [
		'endpoint_auth'  => env('API_SATUSEHAT_AUTH','ENDPOINT-KAMU'),
		'endpoint_base'  => env('API_SATUSEHAT_BASE','ENDPOINT-KAMU'),
		'endpoint_consent'  => env('API_SATUSEHAT_CONSENT','ENDPOINT-KAMU'),
		'client_id' => env('CLIENT_ID_SATUSEHAT', 'SECRET-KAMU'),
		'client_secret' => env('CLIENT_SECRET_SATUSEHAT', 'SECRET-KAMU'),
	]
];