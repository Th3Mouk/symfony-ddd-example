<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class Name
{
    private string $firstName;
    private string $lastName;

    private function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public static function create(string $firstName, string $lastName): self
    {
        return new self($firstName, $lastName);
    }

    public function firstNameToString(): string
    {
        return $this->firstName;
    }

    public function lastNameToString(): string
    {
        return $this->lastName;
    }
}
