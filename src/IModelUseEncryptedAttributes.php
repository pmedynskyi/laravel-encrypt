<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

use Illuminate\Database\Eloquent\Casts\Attribute;

interface IModelUseEncryptedAttributes
{
    public function encryptedAttribute(): Attribute;
}

