<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

interface IModelUseEncryptedAttribute
{
    public function encryptedAttribute(): Attribute;
}

