<?php
declare(strict_types=1);

namespace Pmedynskyi\LaravelEncrypt;

class ModelAttribute
{
    public $get;

    public $set;

    public bool $withCaching = false;

    public bool $withObjectCaching = true;

    public function __construct(callable $get = null, callable $set = null)
    {
        $this->get = $get;
        $this->set = $set;
    }

    public static function make(callable $get = null, callable $set = null): static
    {
        return new static($get, $set);
    }

    public static function get(callable $get): static
    {
        return new static($get);
    }

    public static function set(callable $set): static
    {
        return new static(null, $set);
    }

    public function withoutObjectCaching(): static
    {
        $this->withObjectCaching = false;

        return $this;
    }

    public function shouldCache(): static
    {
        $this->withCaching = true;

        return $this;
    }
}

