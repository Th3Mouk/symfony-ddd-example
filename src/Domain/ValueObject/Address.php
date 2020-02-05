<?php

declare(strict_types=1);

namespace Domain\ValueObject;

final class Address
{
    private StreetNumber $street_number;
    private Street $street;
    private City $city;

    private function __construct(StreetNumber $street_number, Street $street, City $city)
    {
        $this->street_number = $street_number;
        $this->street = $street;
        $this->city = $city;
    }

    public static function create(StreetNumber $street_number, Street $street, City $city): self
    {
        return new self($street_number, $street, $city);
    }

    public function streetNumber(): StreetNumber
    {
        return $this->street_number;
    }

    public function street(): Street
    {
        return $this->street;
    }

    public function city(): City
    {
        return $this->city;
    }
}
