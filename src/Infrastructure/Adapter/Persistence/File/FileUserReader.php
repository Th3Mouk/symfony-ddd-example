<?php

declare(strict_types=1);

namespace Infra\Adapter\Persistence\File;

use Domain\Aggregates\User;
use Domain\Collection\UserCollection;
use Domain\Port\Persistence\UserReader;
use Domain\ValueObject\Address;
use Domain\ValueObject\City;
use Domain\ValueObject\Name;
use Domain\ValueObject\PersonalIdentity;
use Domain\ValueObject\Street;
use Domain\ValueObject\StreetNumber;

final class FileUserReader implements UserReader
{
    /**
     * @inheritDoc
     */
    public function read(): UserCollection
    {
        $contents = file_get_contents(__DIR__ . '/../database.json');

        if (false === $contents) {
            throw new \RuntimeException('Cannot read database lol');
        }

        $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if (!isset($data['users'])) {
            throw new \RuntimeException('Bad JSON format');
        }

        $collection = new UserCollection();

        foreach ($data['users'] as $user) {
            $user = User::create(
                PersonalIdentity::create(
                    Name::create(
                        $user['firstname'],
                        $user['lastname'],
                    ),
                    Address::create(
                        StreetNumber::create($user['address']['street_number']),
                        Street::create($user['address']['street_name']),
                        City::create(
                            $user['address']['city'],
                            $user['address']['postal_code'],
                        ),
                    ),
                )
            );

            $collection->add($user);
        }

        return $collection;
    }

    public function get(): User
    {
        $contents = file_get_contents(__DIR__ . '/../database.json');

        if (false === $contents) {
            throw new \RuntimeException('Cannot read database lol');
        }

        $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if (!isset($data['users'])) {
            throw new \RuntimeException('Bad JSON format');
        }

        foreach ($data['users'] as $user) {
            $user = User::create(
                PersonalIdentity::create(
                    Name::create(
                        $user['firstname'],
                        $user['lastname'],
                        ),
                    Address::create(
                        StreetNumber::create($user['address']['street_number']),
                        Street::create($user['address']['street_name']),
                        City::create(
                            $user['address']['city'],
                            $user['address']['postal_code'],
                            ),
                        ),
                    )
            );

            return $user;
        }
    }
}
