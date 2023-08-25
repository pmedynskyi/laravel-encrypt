<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

interface IModelUseEncryptedAttributes
{
    public function encryptedAttribute(): Attribute;
}

