<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

class EncryptionService
{
    private const DEFAULT_KEY = 'root';
    private const ENCRYPTION_METHOD = 'AES-256-CBC';
    private const DEFAULT_OFFSET = 0;
    private const DEFAULT_LENGTH = 16;
    private const ALGO = 'sha256';

    public static function hash(string $string, bool $encrypt = true): string
    {
        return $encrypt ? self::encrypt($string) : self::decrypt($string);
    }

    public static function decrypt(string $string, string $secretKey = self::DEFAULT_KEY, string $iv = self::DEFAULT_KEY): string
    {
        $secretKey = hash(self::ALGO, $secretKey);
        $iv = substr(hash(self::ALGO, md5($iv)), self::DEFAULT_OFFSET, self::DEFAULT_LENGTH);

        return openssl_decrypt(base64_decode($string), self::ENCRYPTION_METHOD, $secretKey, 0, $iv);
    }

    public static function encrypt(string $string, string $secretKey = self::DEFAULT_KEY, string $iv = self::DEFAULT_KEY): string
    {
        $secretKey = hash(self::ALGO, $secretKey);
        $iv = substr(hash(self::ALGO, md5($iv)), self::DEFAULT_OFFSET, self::DEFAULT_LENGTH);
        $output = openssl_encrypt($string, self::ENCRYPTION_METHOD, $secretKey, 0, $iv);

        return base64_encode($output);
    }
}
