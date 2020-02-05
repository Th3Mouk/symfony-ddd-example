<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class Street
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function create(string $name): self
    {
        return new self($name);
    }

    public function toString(): string
    {
        return $this->name;
    }
}
