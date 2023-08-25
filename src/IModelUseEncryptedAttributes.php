<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

interface ModelUseEncryptedAttribute
{
    public function encryptedAttribute(): Attribute;
}

