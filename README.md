# SATUSEHAT

SATUSEHAT adalah ekosistem pertukaran data kesehatan (HIE: Health Information Exchange) yang menghubungkan sistem informasi atau aplikasi dari seluruh anggota ekosistem digital kesehatan Indonesia termasuk fasyankes, regulator, penjamin, dan penyedia layanan digital. SATUSEHAT sebagai ekosistem telah sesuai dengan Cetak Biru Transformasi Digital Kesehatan 2024 yang dapat diakses di situs dto.kemkes.go.id.

# BRIDGING SATUSEHAT

bridging-satusehat adalah sebuah package yang di desain untuk mempermudah pengguna framework php ataupun native untuk melakukan generate token untuk akses ke service SATUSEHAT baik , semoga package ini dapat membantu teman-teman dalam melakukan develop terhadap perkembangan service SATUSEHAT

## FEATURE

- Custom Url (Url Suka-suka)
- Generate Token ( Otomatis chaneling waktu akses URL BASE )
- Akses Auth URL
- Akses Base URL
- Akses Consent URL (On-going)
- KYC Generator (with RSA key)

## Installation

### Composer

```cmd
composer require virusphp/bridging-satusehat
```

// configurasi for (Support laravel 7 ke atas)

## Publish Config

```cmd
php artisan vendor:publish --provider="Virusphp\BridgingSatusehat\SatusehatServiceProvider" --tag=config
```

## Usage

```env
#Confirasi .env SATUSEHAT

# CONFIG SATUSEHAT PRODUCTION
API_SATUSEHAT_AUTH=https://api-satusehat.kemkes.go.id/oauth2/v1/
API_SATUSEHAT_BASE=https://api-satusehat.kemkes.go.id/fhir-r4/v1/
API_SATUSEHAT_CONSENT=https://api-satusehat.dto.kemkes.go.id/consent/v1/
API_SATUSEHAT_KFA=https://api-satusehat.kemkes.go.id/kfa/
API_SATUSEHAT_KFA_V2=https://api-satusehat.kemkes.go.id/kfa-v2/
API_SATUSEHAT_KYC=https://api-satusehat.kemkes.go.id/kyc/v1/

CLIENT_ID_SATUSEHAT="isi dengan client_id masing2"
CLIENT_SECRET_SATUSEHAT="isi dengan client_secret masing"

```

```php
<?php
// configurasi config (Support laravel 7 ke atas)
config/satusehat.php
return [
	'api' => [
		'endpoint_auth'  => env('API_SATUSEHAT_AUTH','ENDPOINT-KAMU'),
		'endpoint_base'  => env('API_SATUSEHAT_BASE','ENDPOINT-KAMU'),
		'endpoint_kfa'  => env('API_SATUSEHAT_KFA','ENDPOINT-KAMU'),
		'endpoint_kfa_v2'  => env('API_SATUSEHAT_KFA_V2','ENDPOINT-KAMU'),
		'endpoint_kyc'  => env('API_SATUSEHAT_KYC','ENDPOINT-KAMU'),
		'endpoint_consent'  => env('API_SATUSEHAT_CONSENT','ENDPOINT-KAMU'),
		'client_id' => env('CLIENT_ID_SATUSEHAT', 'SECRET-KAMU'),
		'client_secret' => env('CLIENT_SECRET_SATUSEHAT', 'SECRET-KAMU'),
	]
]

```

```php
<?php
// Example Controller bridging to SATUSEHAT  (Laravel 7 ke atas)
use Virusphp\BridgingSatusehat\Bridge\BridgeBase;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeBase();
	}

	// Example To use get Patient
	// Name of Method example
	public function getPatient($nik)
	{
		$endpoint = 'Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|'. $nik;
		return $this->bridging->getRequest($endpoint);
	}
}

```

```php
<?php
// Example Controller bridging to KYC  (PHP 8 & LARAVEL 8 Keatas)
use Virusphp\BridgingSatusehat\Bridge\BridgeKyc;
use Virusphp\BridgingSatusehat\Foundation\Handler\KYCgenerator;

Class KYCController
{
	use KYCgenerator;

	protected $bridgingKYC;

	public function __construct()
	{
		$this->bridgingKYC = new BridgeKyc();
	}

	// Example To use KYC
	// Name of Method example
	public function generateKYC()
	{
		$keyPair = $this->generateRSAKeyPair();
        $publicKey = $keyPair['publicKey'];
        $privateKey = $keyPair['privateKey'];

		$data['agent_name'] = "Admin";
        $data['agent_nik'] = "3375030xxxxxxxx";
        $data['public_key'] = $publicKey;

		$jsonData = json_encode($data);

		$pubPEM = "-----BEGIN PUBLIC KEY-----
			// SEUAIKAN KEY PUBLIC DARI SATUSEHAT KYC
			-----END PUBLIC KEY-----"

        $encryptedPayload = $this->encryptMessage($jsonData, $pubPEM);

		$endpoint = "generate-url";

		$response = $this->satusehat->postRequest($endpoint, $encryptedPayload);

        $result = $this->decryptMessage($response, $privateKey);

        return $result;
	}
}

```

## CHANEL YOUTUBE

KLIK TONTON UNTUK SUPORT (LIKE DAN KOMEN)

[![Watch the video](https://yt3.ggpht.com/ytc/AMLnZu8mCU3GUNwlmATLo2gLb0K_jaWjahlc_qmbRxEl=s88-c-k-c0x00ffffff-no-rj)](https://www.youtube.com/watch?v=Gq8-YOnsR-k&t=257s)

# AUTHOR

Slamet Sugandi
