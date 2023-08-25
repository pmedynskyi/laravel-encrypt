<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

trait ModelUseEncryptedAttributes
{
    public function encryptedAttribute(): ModelAttribute
    {
        return ModelAttribute::make(
            get: fn($value) => EncryptionService::decrypt($value, config('app.key'), config('app.name')),
            set: fn($value) => EncryptionService::encrypt($value, config('app.key'), config('app.name'))
        );
    }
}

