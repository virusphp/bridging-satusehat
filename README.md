# SATUSEHAT

SATUSEHAT adalah ekosistem pertukaran data kesehatan (HIE: Health Information Exchange) yang menghubungkan sistem informasi atau aplikasi dari seluruh anggota ekosistem digital kesehatan Indonesia termasuk fasyankes, regulator, penjamin, dan penyedia layanan digital. SATUSEHAT sebagai ekosistem telah sesuai dengan Cetak Biru Transformasi Digital Kesehatan 2024 yang dapat diakses di situs dto.kemkes.go.id.

# BRIDGING SATUSEHAT

bridging-satusehat adalah sebuah package yang di desain untuk mempermudah pengguna framework php ataupun native untuk melakukan generate token untuk akses ke service SATUSEHAT baik , semoga package ini dapat membantu teman-teman dalam melakukan develop terhadap perkembangan service SATUSEHAT

## FEATURE

- Custom Url
- Generate Token Auth Otomatis
- Akses Base URL
- Akses Consent URL (On-going)

## Installation

### Composer

```cmd
composer require virusphp/bridging-satusehat
```

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

CLIENT_ID_SATUSEHAT="isi dengan client_id masing2"
CLIENT_SECRET_SATUSEHAT="isi dengan client_secret masing"


```

```php
<?php
// configurasi config (Support laravel 7 ke atas)
config/vclaim.php
return [
	'api' => [
		'endpoint_auth'  => env('API_SATUSEHAT_AUTH','ENDPOINT-KAMU'),
		'endpoint_base'  => env('API_SATUSEHAT_BASE','ENDPOINT-KAMU'),
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

## CHANEL YOUTUBE

KLIK TONTON UNTUK SUPORT (LIKE DAN KOMEN)

[![Watch the video](https://yt3.ggpht.com/ytc/AMLnZu8mCU3GUNwlmATLo2gLb0K_jaWjahlc_qmbRxEl=s88-c-k-c0x00ffffff-no-rj)](https://www.youtube.com/watch?v=Gq8-YOnsR-k&t=257s)

## DONASI

- Saweria : https://saweria.co/setsuga
- VIRTUAL AKUN BCA : 122082220801333
- VIRTUAL AKUN BNI : 8807082220801333
- VIRTUAL AKUN BRI : 112082220801333
- VIRTUAL AKUN BSI : 608082220801333
- VIRTUAL AKUN MANDIRI : 893082220801333

# Changelog


### 2021-09-19

- v1.0 Bridging SATUSEHAT New Born
