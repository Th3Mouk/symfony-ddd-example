<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class City
{
    private string $name;
    private string $postal_code;

    private function __construct(string $name, string $postal_code)
    {
        $this->name = $name;
        $this->postal_code = $postal_code;
    }

    public static function create(string $name, string $postal_code): self
    {
        return new self($name, $postal_code);
    }

    public function nameToString(): string
    {
        return $this->name;
    }

    public function postalCodeToString(): string
    {
        return $this->postal_code;
    }
}
