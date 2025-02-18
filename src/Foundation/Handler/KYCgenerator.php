<?php

namespace Virusphp\BridgingSatusehat\Foundation\Handler;

trait KYCgenerator
{
	public function generateRSAKeyPair()
	{
		$privateKey = RSA::createKey(2048);

		$publicKey = $privateKey->getPublicKey();

		$publicKey = $publicKey->toString('PKCS8');

		$result = [
			'privateKey' => $privateKey,
			'publicKey' => $publicKey,
		];

		return $result;
	}

	public function generateSymmetricKey()
	{
		$key = Str::random(32);

		return $key;
	}

	public function aesEncrypt($data, $symmetricKey)
	{
		$ivLength = 12;
		$iv = random_bytes($ivLength);

		$cipher = new AES('gcm');
		$cipher->setKeyLength(256);
		$cipher->setKey($symmetricKey);
		$cipher->setNonce($iv);

		$ciphertext = $cipher->encrypt($data);
		$tag = $cipher->getTag();

		// Concatenate the IV, ciphertext, and tag
		$encryptedData = $iv . $ciphertext . $tag;

		return $encryptedData;
	}

	public function aesDecrypt($encryptedData, $symmetricKey)
	{
		$cipher = 'aes-256-gcm';
		$ivLength = 12;
		$tagLength = 16;

		$iv = substr($encryptedData, 0, $ivLength);
		$tag = substr($encryptedData, -$tagLength);
		$ciphertext = substr($encryptedData, $ivLength, -$tagLength);

		$aes = new AES('gcm');
		$aes->setKey($symmetricKey);
		$aes->setNonce($iv); // Use setNonce instead of setIV for GCM mode
		$aes->setTag($tag);

		$decryptedData = $aes->decrypt($ciphertext);

		return $decryptedData;
	}

	public function formatMessage($data)
	{
		$dataAsBase64 = chunk_split(base64_encode($data));
		return "-----BEGIN ENCRYPTED MESSAGE-----\r\n{$dataAsBase64}-----END ENCRYPTED MESSAGE-----";
	}

	public function encryptMessage($message, $pubPEM)
	{
		// Generate a symmetric key
		$aesKey = $this->generateSymmetricKey(); // Generate a 256-bit key (32 bytes)

		$serverKey = PublicKeyLoader::load($pubPEM);
		$serverKey = $serverKey->withPadding(RSA::ENCRYPTION_OAEP);
		$wrappedAesKey = $serverKey->encrypt($aesKey);

		// Encrypt the message using the generated AES key
		$encryptedMessage = $this->aesEncrypt($message, $aesKey);

		// Combine wrapped AES key and encrypted message
		$payload = $wrappedAesKey . $encryptedMessage;

		return $this->formatMessage($payload);
	}

	function decryptMessage($message, $privateKey)
	{
		$beginTag = "-----BEGIN ENCRYPTED MESSAGE-----";
		$endTag = "-----END ENCRYPTED MESSAGE-----";

		$messageContents = substr(
			$message,
			strlen($beginTag) + 1,
			strlen($message) - strlen($endTag) - strlen($beginTag) - 2
		);

		$binaryDerString = base64_decode($messageContents);

		$wrappedKeyLength = 256;
		$wrappedKey = substr($binaryDerString, 0, $wrappedKeyLength);
		$encryptedMessage = substr($binaryDerString, $wrappedKeyLength);

		$key = PublicKeyLoader::load($privateKey);
		$aesKey = $key->decrypt($wrappedKey);

		$decryptedMessage = $this->aesDecrypt($encryptedMessage, $aesKey);

		return $decryptedMessage;
	}
}
