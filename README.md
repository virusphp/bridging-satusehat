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
php artisan vendor:publish --provider="Vclaim\BridgingSatusehat\SatusehatServiceProvider" --tag=config
```

## Usage

```env
#Confirasi .env BPJS
CONS_ID=xxxxx
SECRET_KEY=xxxX

#Config untuk Vclaim BPJS
API_BPJS_VCLAIM=https://apijkn.bpjs-kesehatan.go.id/vclaim-rest-dev/
USER_KEY_VCLAIM=xxxx

#Config untuk Vclaim BPJS
API_BPJS_ICARE=https://apijkn.bpjs-kesehatan.go.id/ihs_dev/

#Config untuk Antrol BPJS
API_BPJS_ANTROL=https://apijkn.bpjs-kesehatan.go.id/antreanrs_dev/
USER_KEY_ANTROL=xxxx


##Configurasi .env untuk sirs kemkes
USER_ID=xxxx
PASS_ID=xxxx
API_KEMKES=http://sirs.kemkes.go.id/fo/index.php/

```

```php
<?php
// configurasi config (Support laravel 7 ke atas)
config/vclaim.php
return [
	'api' => [
		'endpoint'  => env('API_BPJS','ENDPOINT-KAMU'),
		'consid'  => env('CONS_ID','CONSID-KAMU'),
		'seckey' => env('SECRET_KEY', 'SECRET-KAMU'),
		'user_key' => env('USER_KEY', 'SECRET-KAMU'),
	]
]

```

```php
<?php
// Example Controller bridging to Vclaim BPJS  (Laravel 7 ke atas)
use Bpjs\Bridging\Vclaim\BridgeVclaim;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeVclaim();
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getDiagnosa($kode)
	{
		$endpoint = 'referensi/diagnosa/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}
}
```

```php
<?php
// Example Controller bridging to Vclaim BPJS  (Laravel 7 ke atas)
use Bpjs\Bridging\Icare\BridgeIcare;
use Illuminate\Http\Request;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeIcare();
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getHistory(Request $reqeust)
	{
		$data = $this->handleRequest($reqeust);
		$endpoint = 'api/rs/validate';
		return $this->bridging->postRequest($endpoint, $data);
	}

	protected function handleRequest($request)
	{
		$data['param'] = $request->nomor_kartu;
		$data['kodedokter'] = $request->kode_dokter;
		return json_encode($data);
	}
}
```

```php
<?php
// Example Controller bridging to SIRS Kemkes  (Laravel 7 ke atas)
use Kemkes\Bridging\BridgingKemkes;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgingKemkes();
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getFasyankes($kode)
	{
		$endpoint = 'Fasyankes'. $kode;
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

#### 2023-09-09

- v2.1.2 Add new fitur briding I-care

#### 2022-11-26

- v2.1.1 Fixed bug duplication encode string

#### 2022-10-15

- v2.0.9 Refactoring Guzzle to curl and replace all guzzle

#### 2022-10-07

- v2.0.9 fixed delete method for sep, surat kontrol, and rujukan

#### 2022-02-26

- v2.0.0 Release Mayor Refactoring all service (New Service Antrol)

#### 2022-01-29 - 2022-02-07

- v1.3.7 add support use to native php

#### 2022-01-25

- v1.3.4 bug response antrol not same vclaim and add response antrol

#### 2022-01-25

- v1.3.2 and v.13.3 fix bug response and add support php version 8

#### 2022-01-12

- v1.3.1 fix bug response json to encode

#### 2022-01-04

- v1.3 fix bug and single generate timestamp to open key

#### 2021-12-31

- v1.2 fixed bug minor

#### 2021-12-28

- v1.1 fixed bug minor

### 2021-12-27

- v1.0 Add user_key to bridging versi 2 and fix bug

### 2021-11-22

- v0.8-beta fix bug minor

### 2021-09-19

- v0.7-beta fix bug minor both briding old and new version

### 2021-09-19

- v0.6-beta Refactor and new fitur bridging kemkes
