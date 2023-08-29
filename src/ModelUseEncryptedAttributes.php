<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Config;

trait ModelUseEncryptedAttributes
{
    protected ?string $secretKey = null;
    protected ?string $iv = null;

    public function encryptedAttribute(): Attribute
    {
        return Attribute::make(
            get: fn($value) => EncryptionService::decrypt($value, $this->getSecretKey(), $this->getIv()),
            set: fn($value) => EncryptionService::encrypt($value, $this->getSecretKey(), $this->getIv())
        );
    }

    protected function getSecretKey(): string
    {
        if (is_null($this->secretKey)) {
            $this->secretKey = Config::get('encrypt.secret_key');
        }

        return $this->secretKey;
    }

    protected function getIv(): string
    {
        if (is_null($this->iv)) {
            $this->iv = Config::get('encrypt.iv');
        }

        return $this->iv;
    }
}

