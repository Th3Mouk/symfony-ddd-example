<?php

declare(strict_types=1);

namespace Domain\Identifier;

final class UserIdentifier
{
    private string $id;

    private function __construct()
    {
        $this->id = uniqid();
    }

    public static function create(): self
    {
        return new self();
    }

    public function toString(): string
    {
        return $this->id;
    }
}
