<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class StreetNumber
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): self
    {
        return new self($value);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
