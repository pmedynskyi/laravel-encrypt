<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

use Illuminate\Database\Eloquent\Casts\Attribute;

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
            $this->secretKey = config('encrypt.secret_key');
        }

        return $this->secretKey;
    }

    protected function getIv(): string
    {
        if (is_null($this->iv)) {
            $this->iv = config('encrypt.iv');
        }

        return $this->iv;
    }
}

