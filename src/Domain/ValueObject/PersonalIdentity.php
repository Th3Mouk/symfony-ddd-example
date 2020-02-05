<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class PersonalIdentity
{
    private Name $name;
    private Address $address;

    private function __construct(Name $name, Address $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public static function create(Name $name, Address $address): self
    {
        return new self($name, $address);
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function address(): Address
    {
        return $this->address;
    }
}
